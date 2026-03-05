<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Auto-École') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-900 bg-gray-50">
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-emerald-600 flex items-center gap-2">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    AutoLiberté
                </a>
            </div>
            <nav class="hidden md:flex space-x-8">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-emerald-600 font-medium tracking-wide">Accueil</a>
                <a href="{{ route('formations.public') }}" class="text-gray-600 hover:text-emerald-600 font-medium tracking-wide">Formations</a>
                <a href="#" class="text-gray-600 hover:text-emerald-600 font-medium tracking-wide">Contact</a>
            </nav>
            <div class="flex items-center space-x-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-emerald-600 hover:text-emerald-700 font-medium tracking-wide">Mon Espace</a>
                @else
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-emerald-600 font-medium tracking-wide">Connexion</a>
                    <a href="{{ route('register') }}" class="bg-emerald-600 text-white px-5 py-2 rounded-full font-medium hover:bg-emerald-700 transition shadow-sm">S'inscrire</a>
                @endauth
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-slate-900 border-t border-slate-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center">
            <div class="mb-6 md:mb-0">
                <span class="text-2xl font-bold text-emerald-500 flex items-center gap-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    AutoLiberté
                </span>
                <p class="text-slate-400 mt-2 text-sm">Votre réussite au permis de conduire,<br>notre priorité.</p>
            </div>
            <div class="text-slate-500 text-sm">
                &copy; {{ date('Y') }} AutoLiberté. Tous droits réservés.
            </div>
        </div>
    </footer>
</body>
</html>
