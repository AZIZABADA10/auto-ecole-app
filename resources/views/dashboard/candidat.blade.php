<x-app-layout>
    <x-slot name="header">
        Bienvenue dans votre Espace Candidat
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 hover:shadow-md transition flex flex-col items-center justify-center text-center">
            <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center mb-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 002 2z"></path></svg>
            </div>
            <h3 class="text-xl font-bold text-gray-800">Mon Planning</h3>
            <p class="text-gray-500 mt-2 mb-6">Consultez vos prochaines séances de conduite.</p>
            <a href="{{ route('reservations.index') }}" class="px-6 py-2 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 transition">Voir mon planning</a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 hover:shadow-md transition flex flex-col items-center justify-center text-center">
            <div class="w-16 h-16 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center mb-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            </div>
            <h3 class="text-xl font-bold text-gray-800">Nouvelle Réservation</h3>
            <p class="text-gray-500 mt-2 mb-6">Planifiez une nouvelle séance de conduite.</p>
            <a href="{{ route('reservations.create') }}" class="px-6 py-2 bg-emerald-600 text-white rounded-lg font-medium hover:bg-emerald-700 transition">Réserver une séance</a>
        </div>
    </div>
</x-app-layout>
