<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\Seance;
use App\Models\Reservation;

class ReservationController extends Controller {
    public function create() {
        \Illuminate\Support\Facades\Gate::authorize('create', Reservation::class);
        $formations = Formation::all();
        $seances = Seance::where('statut', 'disponible')->where('date', '>=', now()->toDateString())->get();
        return view('reservations.create', compact('formations', 'seances'));
    }

    public function store(Request $request) {
        \Illuminate\Support\Facades\Gate::authorize('create', Reservation::class);
        $request->validate(['seance_id' => 'required|exists:seances,id']);
        
        $candidat = $request->user()->candidat;
        if (!$candidat) abort(403, 'Profil candidat requis.');

        Reservation::create([
            'seance_id' => $request->seance_id,
            'candidat_id' => $candidat->id,
            'statut' => 'en_attente'
        ]);

        return redirect()->route('candidat.dashboard')->with('success', 'Réservation validée.');
    }

    public function index(Request $request) {
        \Illuminate\Support\Facades\Gate::authorize('viewAny', Reservation::class);
        $candidat = $request->user()->candidat;
        if (!$candidat) abort(403);
        
        $reservations = Reservation::with('seance.formation')
            ->where('candidat_id', $candidat->id)
            ->latest()
            ->get();
        return view('reservations.index', compact('reservations'));
    }

    public function indexAdmin() {
        \Illuminate\Support\Facades\Gate::authorize('manage-reservations');
        $reservations = Reservation::with(['candidat.user', 'seance.formation'])->latest()->paginate(10);
        return view('reservations.admin_index', compact('reservations'));
    }

    public function updateStatus(Request $request, Reservation $reservation) {
        \Illuminate\Support\Facades\Gate::authorize('update', $reservation);
        $request->validate(['statut' => 'required|in:confirmee,annulee,en_attente']);
        $reservation->update(['statut' => $request->statut]);
        
        return back()->with('success', 'Statut de la réservation mis à jour.');
    }

    public function destroy(Reservation $reservation) {
        \Illuminate\Support\Facades\Gate::authorize('delete', $reservation);
        
        if ($reservation->statut !== 'en_attente' && !auth()->user()->isAdmin()) {
            return back()->with('error', 'Vous ne pouvez plus annuler cette réservation car elle est déjà traitée.');
        }

        $reservation->delete();
        return back()->with('success', 'Réservation annulée avec succès.');
    }
}
