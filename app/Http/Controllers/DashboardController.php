<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reservation;
use App\Models\Paiement;
use App\Models\Formation;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        
        if ($user->isAdmin() || $user->isAssistante()) {
            
            // KPIs de base
            $stats = [
                'total_candidats' => User::whereHas('role', fn($q) => $q->where('name', 'candidat'))->count(),
                'total_staff' => User::whereHas('role', fn($q) => $q->whereIn('name', ['admin', 'assistante', 'moniteur']))->count(),
                'total_reservations' => Reservation::count(),
                'revenus' => Paiement::whereIn('statut', ['paye', 'partiel'])->sum('montant'),
            ];

            // Données pour Chart.js - Revenus mensuels (sur les 6 derniers mois par ex)
            $sixMonthsAgo = Carbon::now()->subMonths(5)->startOfMonth();
            $revenusMensuels = Paiement::whereIn('statut', ['paye', 'partiel'])
                ->where('date_paiement', '>=', $sixMonthsAgo)
                ->select(DB::raw('SUM(montant) as total'), DB::raw('DATE_FORMAT(date_paiement, "%Y-%m") as mois'))
                ->groupBy('mois')
                ->orderBy('mois')
                ->get();

            // Mapping pour s'assurer qu'on a tous les mois même si 0
            $labelsRevenus = [];
            $dataRevenus = [];
             for ($i = 5; $i >= 0; $i--) {
                $month = Carbon::now()->subMonths($i);
                $monthKey = $month->format('Y-m');
                $labelsRevenus[] = $month->translatedFormat('F Y');
                
                $match = $revenusMensuels->firstWhere('mois', $monthKey);
                $dataRevenus[] = $match ? $match->total : 0;
            }

            // Données pour Chart.js - Réservations par formation
            $reservationsParFormation = Formation::withCount('seances')->get();
            $labelsFormations = [];
            $dataFormations = [];

            // Puisqu'on lie la réservation à la séance, on regarde le nombre de résa par formation
            $resByForm = DB::table('reservations')
                ->join('seances', 'reservations.seance_id', '=', 'seances.id')
                ->join('formations', 'seances.formation_id', '=', 'formations.id')
                ->select('formations.nom', DB::raw('count(*) as total'))
                ->groupBy('formations.nom')
                ->get();

            foreach ($resByForm as $rf) {
                $labelsFormations[] = $rf->nom;
                $dataFormations[] = $rf->total;
            }

            return view('dashboard.admin', compact(
                'stats', 
                'labelsRevenus', 'dataRevenus', 
                'labelsFormations', 'dataFormations'
            ));
        }

        if ($user->role && $user->role->name === 'moniteur') {
            $moniteur = $user->moniteur;
            if (!$moniteur) abort(403);

            $seances = \App\Models\Seance::with(['formation', 'reservations.candidat.user'])
                ->where('moniteur_id', $moniteur->id)
                ->where('date', '>=', now()->toDateString())
                ->orderBy('date')
                ->orderBy('heure_debut')
                ->get();

            $totalHeures = \App\Models\Seance::where('moniteur_id', $moniteur->id)
                ->where('statut', 'terminee')
                ->count();

            return view('dashboard.moniteur', compact('seances', 'totalHeures'));
        }

        // ESPACE CANDIDAT
        $candidat = $user->candidat;
        if (!$candidat) {
            abort(403, 'Profil candidat introuvable.');
        }

        // Prochaine séance
        $prochaineSeance = Reservation::with('seance.formation')
            ->where('candidat_id', $candidat->id)
            ->where('statut', 'confirmee')
            ->whereHas('seance', fn($q) => $q->where('date', '>=', now()->toDateString()))
            ->first();

        // Statistiques Heures
        $heuresFaites = Reservation::where('candidat_id', $candidat->id)
            ->where('statut', 'confirmee')
            ->whereHas('seance', fn($q) => $q->where('statut', 'terminee'))
            ->count(); // Chaque séance = 1h par défaut ou à adapter

        // Statistiques Paiements
        $totalPaye = Paiement::where('candidat_id', $candidat->id)
            ->whereIn('statut', ['paye', 'partiel'])
            ->sum('montant');
        
        $formationsIds = Reservation::where('candidat_id', $candidat->id)->join('seances', 'reservations.seance_id', '=', 'seances.id')->pluck('seances.formation_id')->unique();
        $totalDevis = Formation::whereIn('id', $formationsIds)->sum('prix');
        $resteAPayer = max(0, $totalDevis - $totalPaye);

        return view('dashboard.candidat', compact(
            'prochaineSeance', 
            'heuresFaites', 
            'totalPaye', 
            'resteAPayer'
        ));
    }
}
