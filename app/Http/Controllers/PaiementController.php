<?php
namespace App\Http\Controllers;

use App\Models\Paiement;
use App\Models\Candidat;
use App\Models\Formation;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        \Illuminate\Support\Facades\Gate::authorize('manage-paiements');
        
        $paiements = Paiement::with(['candidat.user', 'formation'])->latest()->paginate(10);
        $candidats = Candidat::with('user')->get();
        $formations = Formation::all();
        
        return view('paiements.index', compact('paiements', 'candidats', 'formations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        \Illuminate\Support\Facades\Gate::authorize('create', Paiement::class);
        
        $validated = $request->validate([
            'candidat_id' => 'required|exists:candidats,id',
            'formation_id' => 'required|exists:formations,id',
            'montant' => 'required|numeric|min:0',
            'methode_paiement' => 'required|string',
            'date_paiement' => 'required|date',
            'statut' => 'required|in:paye,partiel,non_paye'
        ]);

        Paiement::create($validated);

        return redirect()->route(auth()->user()->role->value . '.paiements.index')->with('success', 'Paiement ajouté avec succès.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paiement $paiement)
    {
        \Illuminate\Support\Facades\Gate::authorize('update', $paiement);
        
        $candidats = Candidat::with('user')->get();
        $formations = Formation::all();
        
        return view('paiements.form', compact('paiement', 'candidats', 'formations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paiement $paiement)
    {
        \Illuminate\Support\Facades\Gate::authorize('update', $paiement);
        
        $validated = $request->validate([
            'candidat_id' => 'required|exists:candidats,id',
            'formation_id' => 'required|exists:formations,id',
            'montant' => 'required|numeric|min:0',
            'methode_paiement' => 'required|string',
            'date_paiement' => 'required|date',
            'statut' => 'required|in:paye,partiel,non_paye'
        ]);

        $paiement->update($validated);

        return redirect()->route(auth()->user()->role->value . '.paiements.index')->with('success', 'Paiement mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paiement $paiement)
    {
        \Illuminate\Support\Facades\Gate::authorize('delete', $paiement);
        
        $paiement->delete();
        return back()->with('success', 'Paiement supprimé.');
    }

    /**
     * Affichage pour le candidat (Mes paiements)
     */
    public function indexCandidat(Request $request)
    {
        \Illuminate\Support\Facades\Gate::authorize('viewAny', Paiement::class);
        
        $candidat = $request->user()->candidat;
        if (!$candidat) abort(403);

        $paiements = Paiement::with('formation')
            ->where('candidat_id', $candidat->id)
            ->latest()
            ->get();
            
        $totalPaye = $paiements->where('statut', '!=', 'non_paye')->sum('montant');
        $formationsIds = $paiements->pluck('formation_id')->filter()->unique();
        $formations = Formation::whereIn('id', $formationsIds)->get();
        
        $totalAPayer = $formations->sum('prix');
        $resteAPayer = max(0, $totalAPayer - $totalPaye);

        return view('paiements.candidat_index', compact('paiements', 'totalPaye', 'totalAPayer', 'resteAPayer'));
    }
}
