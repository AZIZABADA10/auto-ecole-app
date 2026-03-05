<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reservation;
use App\Models\Paiement;

class DashboardController extends Controller {
    public function index(Request $request) {
        $user = $request->user();
        if ($user->isAdmin() || $user->isAssistante()) {
            $stats = [
                'total_eleves' => User::whereHas('role', fn($q) => $q->where('name', 'candidat'))->count(),
                'total_reservations' => Reservation::count(),
                'revenus' => Paiement::where('statut', 'paye')->sum('montant'),
            ];
            return view('dashboard.admin', compact('stats'));
        }
        return view('dashboard.candidat');
    }
}
