@extends('layouts.public')

@section('content')
<div class="bg-white py-16 sm:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto">
            <h2 class="text-base font-semibold text-emerald-600 tracking-wide uppercase">Toutes nos Formations</h2>
            <p class="mt-1 text-4xl font-extrabold text-gray-900 sm:text-5xl">Trouvez la formule qui vous correspond</p>
            <p class="mt-4 text-xl text-gray-500">Du code à la conduite, nous vous proposons un apprentissage adapté à votre profil.</p>
        </div>

        <div class="mt-16 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            @forelse($formations as $formation)
            <div class="bg-gray-50 rounded-2xl border border-gray-100 overflow-hidden flex flex-col shadow-sm hover:shadow-md transition">
                <div class="h-48 bg-emerald-100 flex items-center justify-center p-6 text-emerald-600">
                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <div class="p-8 flex-1">
                    <h3 class="text-2xl font-bold text-gray-900">{{ $formation->nom }}</h3>
                    <p class="mt-4 text-gray-600 leading-relaxed">{{ $formation->description }}</p>
                    <ul class="mt-6 space-y-4">
                        <li class="flex items-center text-gray-600">
                            <svg class="h-5 w-5 text-emerald-500 shrink-0 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                            </svg>
                            {{ $formation->duree_heures ?? 20 }} heures de pratique
                        </li>
                    </ul>
                </div>
                <div class="p-8 bg-gray-100 mt-auto border-t border-gray-200">
                    <p class="text-center text-4xl font-extrabold text-slate-800">{{ number_format($formation->prix, 2) }} €</p>
                    <a href="{{ route('register') }}" class="mt-6 block w-full bg-emerald-600 hover:bg-emerald-700 text-white text-center font-bold py-3 px-4 rounded-xl shadow-sm transition">Commencer</a>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center text-gray-500 py-8">Aucune formation disponible.</div>
            @endforelse
        </div>
    </div>
</div>
@endsection
