<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\Seance;
use App\Models\Reservation;

class ReservationController extends Controller {
    public function create() {
        $formations = Formation::all();
        $seances = Seance::where('statut', 'disponible')->where('date', '>=', now()->toDateString())->get();
        return view('reservations.create', compact('formations', 'seances'));
    }

    public function store(Request $request) {
        $request->validate(['seance_id' => 'required|exists:seances,id']);
        Reservation::create([
            'seance_id' => $request->seance_id,
            'candidat_id' => $request->user()->candidat->id,
            'statut' => 'en_attente'
        ]);
        return redirect()->route('dashboard')->with('success', 'Réservation validée.');
    }

    public function index(Request $request) {
        $candidat = $request->user()->candidat;
        if (!$candidat) abort(403);
        
        $reservations = Reservation::with('seance.formation')
            ->where('candidat_id', $candidat->id)
            ->latest()
            ->get();
        return view('reservations.index', compact('reservations'));
    }

    public function indexAdmin() {
        $reservations = Reservation::with(['candidat.user', 'seance.formation'])->latest()->paginate(10);
        return view('reservations.admin_index', compact('reservations'));
    }

    public function updateStatus(Request $request, Reservation $reservation) {
        $request->validate(['statut' => 'required|in:confirmee,annulee,en_attente']);
        $reservation->update(['statut' => $request->statut]);
        
        return back()->with('success', 'Statut de la réservation mis à jour.');
    }

    public function destroy(Reservation $reservation) {
        // Un candidat ne peut annuler que ses propres réservations en attente
        if ($reservation->candidat_id !== auth()->user()->candidat->id) {
            abort(403);
        }
        
        if ($reservation->statut !== 'en_attente') {
            return back()->with('error', 'Vous ne pouvez plus annuler cette réservation car elle est déjà traitée.');
        }

        $reservation->delete();
        return back()->with('success', 'Réservation annulée avec succès.');
    }
}
