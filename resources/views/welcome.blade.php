@extends('layouts.public')

@section('content')
<div class="relative bg-emerald-700 overflow-hidden">
    <div class="max-w-7xl mx-auto">
        <div class="relative z-10 pb-8 bg-emerald-700 sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
            <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                <div class="sm:text-center lg:text-left pt-12 md:pt-20">
                    <h1 class="text-4xl tracking-tight font-extrabold text-white sm:text-5xl md:text-6xl">
                        <span class="block xl:inline">Prenez la route avec</span>
                        <span class="block text-emerald-300">confiance et sécurité</span>
                    </h1>
                    <p class="mt-3 text-base text-emerald-100 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                        AutoLiberté vous accompagne de A à Z pour obtenir votre permis de conduire. Moniteurs qualifiés, véhicules récents et apprentissage sur-mesure.
                    </p>
                    <div class="mt-8 sm:mt-10 sm:flex sm:justify-center lg:justify-start gap-4">
                        <div class="rounded-md shadow">
                            <a href="{{ route('register') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-emerald-700 bg-white hover:bg-gray-50 md:py-4 md:text-lg md:px-10 transition">
                                S'inscrire maintenant
                            </a>
                        </div>
                        <div class="mt-3 sm:mt-0">
                            <a href="{{ route('formations.public') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-emerald-800 hover:bg-emerald-900 md:py-4 md:text-lg md:px-10 transition">
                                Nos formations
                            </a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
        <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full opacity-80" src="https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?auto=format&fit=crop&q=80&w=1000" alt="Conduite Auto-école">
        <div class="absolute inset-0 bg-gradient-to-r from-emerald-700 to-transparent"></div>
    </div>
</div>

<div class="bg-gray-50 py-16 sm:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-base font-semibold text-emerald-600 tracking-wide uppercase">Nos Formations</h2>
            <p class="mt-1 text-4xl font-extrabold text-gray-900 sm:text-5xl">Choisissez votre permis</p>
        </div>

        <div class="mt-16 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            @forelse($formations as $formation)
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
                <div class="h-48 bg-gray-200">
                    <img class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1517409241673-db96f7c6b5b5?auto=format&fit=crop&q=80&w=800" alt="Formation">
                </div>
                <div class="p-8">
                    <div class="uppercase tracking-wide text-sm text-emerald-500 font-semibold">{{ $formation->nom }}</div>
                    <p class="mt-2 text-gray-500 line-clamp-3">{{ $formation->description ?? 'Formation complète.' }}</p>
                    <div class="mt-6 flex items-baseline gap-x-2">
                        <span class="text-4xl font-bold tracking-tight text-gray-900">{{ number_format($formation->prix, 2) }} €</span>
                    </div>
                    <a href="{{ route('formations.public') }}" class="mt-8 block w-full bg-slate-800 hover:bg-slate-700 text-white text-center font-bold py-3 px-4 rounded-xl transition">Voir les détails</a>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center text-gray-500 py-8">Aucune formation disponible pour le moment.</div>
            @endforelse
        </div>
    </div>
</div>
@endsection
