<x-guest-layout>
    <div class="min-h-screen flex">
        <!-- Section image (Gauche) -->
        <div class="hidden lg:block lg:w-1/2 relative bg-emerald-900 overflow-hidden">
            <img class="absolute inset-0 h-full w-full object-cover opacity-60" src="https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?auto=format&fit=crop&q=80&w=1000" alt="Conduite auto-école">
            <div class="absolute inset-0 bg-gradient-to-t from-emerald-900/90 to-emerald-900/20"></div>
            <div class="absolute bottom-0 left-0 p-12 text-white">
                <div class="flex items-center gap-3 mb-6">
                    <svg class="w-10 h-10 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    <span class="text-3xl font-bold tracking-wider">AutoLiberté</span>
                </div>
                <h2 class="text-4xl font-extrabold mb-4 leading-tight">La liberté commence <br>derrière le volant</h2>
                <p class="text-emerald-100 text-lg max-w-md">Rejoignez des milliers de candidats qui ont obtenu leur permis de conduire avec succès grâce à notre méthode d'apprentissage moderne.</p>
            </div>
        </div>

        <!-- Section formulaire (Droite) -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12 lg:p-24 bg-gray-50">
            <div class="w-full max-w-md bg-white rounded-3xl shadow-xl p-8 sm:p-10 border border-gray-100">
                
                <!-- En-tête Mobile -->
                <div class="lg:hidden flex justify-center mb-8">
                    <div class="flex items-center gap-2 text-emerald-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        <span class="text-2xl font-bold">AutoLiberté</span>
                    </div>
                </div>

                <div class="text-center mb-10">
                    <h2 class="text-3xl font-bold text-gray-900">Bon retour ! 👋</h2>
                    <p class="text-gray-500 mt-2">Connectez-vous à votre espace personnel</p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Adresse Email</label>
                        <input id="email" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors bg-gray-50 focus:bg-white @error('email') border-red-500 @enderror" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="exemple@domaine.com" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600 text-sm" />
                    </div>

                    <!-- Password -->
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                            @if (Route::has('password.request'))
                                <a class="text-sm font-medium text-emerald-600 hover:text-emerald-500" href="{{ route('password.request') }}">
                                    Oublié ?
                                </a>
                            @endif
                        </div>
                        <input id="password" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors bg-gray-50 focus:bg-white @error('password') border-red-500 @enderror" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600 text-sm" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox" class="w-5 h-5 rounded border-gray-300 text-emerald-600 focus:ring-emerald-500" name="remember">
                        <label for="remember_me" class="ml-3 block text-sm text-gray-700">Se souvenir de moi</label>
                    </div>

                    <div>
                        <button type="submit" class="w-full flex justify-center items-center py-3.5 px-4 border border-transparent rounded-xl shadow-sm text-base font-bold text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-all transform active:scale-95">
                            Se connecter
                            <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>
                    </div>
                </form>

                <div class="mt-8 text-center text-sm text-gray-600">
                    Pas encore de compte ? 
                    <a href="{{ route('register') }}" class="font-bold text-emerald-600 hover:text-emerald-500 transition-colors">Inscrivez-vous ici</a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
