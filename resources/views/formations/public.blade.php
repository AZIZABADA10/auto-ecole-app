@extends('layouts.public')

@section('content')
<div class="bg-slate-50 py-16 sm:py-24 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <h2 class="text-emerald-600 font-bold tracking-wide uppercase text-sm mb-3">Nos Formules</h2>
            <h1 class="text-4xl font-extrabold text-slate-900 sm:text-5xl tracking-tight">Apprenez à conduire<br>à votre rythme</h1>
            <p class="mt-4 text-xl text-slate-500">Choisissez la formation qui vous correspond et rejoignez des centaines de candidats satisfaits.</p>
        </div>

        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            @forelse($formations as $formation)
            <div class="group relative bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-slate-100 flex flex-col">
                <!-- Image Section -->
                <div class="relative h-60 w-full overflow-hidden bg-slate-200">
                    @if($formation->image_path)
                        <img src="{{ Storage::url($formation->image_path) }}" alt="{{ $formation->nom }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    @else
                        <!-- Fallback Placeholder -->
                        <div class="w-full h-full flex items-center justify-center bg-emerald-100 text-emerald-500">
                            <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                    @endif
                    <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-4 py-1.5 rounded-full shadow-sm">
                        <span class="text-sm font-bold text-slate-900">{{ number_format($formation->prix, 0) }} DH</span>
                    </div>
                </div>

                <!-- Content Section -->
                <div class="p-8 flex-1 flex flex-col">
                    <h3 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-emerald-600 transition-colors">{{ $formation->nom }}</h3>
                    <p class="text-slate-500 leading-relaxed mb-6 flex-1">{{ $formation->description }}</p>
                    
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center text-sm font-medium text-slate-600">
                            <svg class="h-5 w-5 text-emerald-500 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            {{ $formation->duree_heures ?? 20 }} heures de pratique
                        </li>
                        <li class="flex items-center text-sm font-medium text-slate-600">
                            <svg class="h-5 w-5 text-emerald-500 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Code de la route inclus
                        </li>
                    </ul>

                    <!-- Action Button -->
                    @auth
                        @if(Auth::user()->isCandidat())
                            <a href="{{ route('candidat.reservations.create') }}" class="block w-full text-center bg-slate-900 hover:bg-emerald-600 text-white font-semibold py-3.5 px-6 rounded-xl transition-colors duration-300">
                                Réserver une séance
                            </a>
                        @else
                            <button disabled class="w-full text-center bg-slate-100 text-slate-400 font-semibold py-3.5 px-6 rounded-xl cursor-not-allowed">
                                Espace administrateur
                            </button>
                        @endif
                    @else
                        <a href="{{ route('register') }}" class="block w-full text-center bg-slate-900 hover:bg-emerald-600 text-white font-semibold py-3.5 px-6 rounded-xl transition-colors duration-300 shadow-md hover:shadow-lg">
                            M'inscrire pour réserver
                        </a>
                    @endauth
                </div>
            </div>
            @empty
            <div class="col-span-full pt-12 text-center">
                <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-slate-100 text-slate-400 mb-6">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Aucune formation disponible</h3>
                <p class="text-slate-500">Nos offres seront bientôt mises à jour. Revenez plus tard !</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
