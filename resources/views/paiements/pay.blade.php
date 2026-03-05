<x-app-layout>
    <x-slot name="header">
        Paiement de votre réservation
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8 text-center">
                <div class="mb-8">
                    <div class="h-20 w-20 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                    </div>
                    <h2 class="text-3xl font-extrabold text-gray-900">Finalisez votre paiement</h2>
                    <p class="mt-2 text-gray-600">Réservation pour la formation : <strong>{{ $paiement->formation->nom }}</strong></p>
                    <p class="text-4xl font-bold text-emerald-600 mt-4">{{ number_format($paiement->montant, 2) }} DH</p>
                </div>

                <div class="bg-slate-50 border border-slate-200 rounded-xl p-6 mb-8 text-left">
                    <h3 class="text-sm font-semibold text-slate-500 uppercase tracking-wider mb-4">Détail de la transaction</h3>
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-600">Référence</span>
                        <span class="font-mono text-gray-900">PAY-{{ str_pad($paiement->id, 6, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Date</span>
                        <span class="text-gray-900">{{ now()->format('d/m/Y') }}</span>
                    </div>
                </div>

                <form action="{{ route('candidat.paiements.success', $paiement) }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full inline-flex justify-center items-center px-6 py-4 bg-indigo-600 border border-transparent rounded-xl font-bold text-white uppercase tracking-widest hover:bg-indigo-700 transition duration-150 ease-in-out shadow-lg transform hover:-translate-y-1">
                        <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path><path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"></path></svg>
                        Payer maintenant avec Stripe (Démo)
                    </button>
                </form>

                <p class="mt-6 text-xs text-gray-400 italic">
                    Ceci est une simulation de paiement. En cliquant sur le bouton, le statut passera à "Payé".
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
