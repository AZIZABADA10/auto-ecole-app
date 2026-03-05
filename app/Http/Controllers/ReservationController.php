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

    public function indexAdmin() {
        $reservations = Reservation::with(['candidat.user', 'seance.formation'])->latest()->paginate(10);
        return view('reservations.admin_index', compact('reservations'));
    }
}
