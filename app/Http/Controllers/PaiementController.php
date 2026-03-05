<?php
namespace App\Http\Controllers;
use App\Models\Paiement;
use Illuminate\Http\Request;

class PaiementController extends Controller {
    public function index() {
        $paiements = Paiement::with('candidat.user')->latest()->paginate(10);
        return view('paiements.index', compact('paiements'));
    }
    
    public function indexCandidat(Request $request) {
        $paiements = Paiement::where('candidat_id', $request->user()->candidat->id ?? 0)->latest()->get();
        return view('paiements.candidat_index', compact('paiements'));
    }
}
