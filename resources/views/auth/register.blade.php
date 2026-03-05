<x-guest-layout>
    <div class="min-h-screen flex">
        <!-- Section image (Gauche) -->
        <div class="hidden lg:block lg:w-1/2 relative bg-slate-900 overflow-hidden">
            <img class="absolute inset-0 h-full w-full object-cover opacity-50" src="https://images.unsplash.com/photo-1549317661-bd32c8ce0be2?auto=format&fit=crop&q=80&w=1000" alt="Inscription auto-école">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 to-slate-900/20"></div>
            <div class="absolute bottom-0 left-0 p-12 text-white">
                <div class="flex items-center gap-3 mb-6">
                    <svg class="w-10 h-10 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    <span class="text-3xl font-bold tracking-wider">AutoLiberté</span>
                </div>
                <h2 class="text-4xl font-extrabold mb-4 leading-tight">Commencez votre voyage <br>aujourd'hui</h2>
                <p class="text-slate-300 text-lg max-w-md">L'inscription ne prend que quelques minutes. Préparez-vous à obtenir votre permis avec les meilleurs formateurs.</p>
                
                <div class="mt-8 flex gap-4 text-sm font-medium text-slate-400">
                    <div class="flex items-center gap-2"><svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> 100% en ligne</div>
                    <div class="flex items-center gap-2"><svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Annulation gratuite</div>
                </div>
            </div>
        </div>

        <!-- Section formulaire (Droite) -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12 lg:p-16 bg-gray-50 overflow-y-auto">
            <div class="w-full max-w-md bg-white rounded-3xl shadow-xl p-8 sm:p-10 border border-gray-100 my-auto">
                
                <!-- En-tête Mobile -->
                <div class="lg:hidden flex justify-center mb-6">
                    <div class="flex items-center gap-2 text-emerald-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        <span class="text-2xl font-bold">AutoLiberté</span>
                    </div>
                </div>

                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-900">Créer un compte </h2>
                    <p class="text-gray-500 mt-2">Rejoignez-nous en complétant vos informations.</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nom complet</label>
                        <input id="name" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors bg-gray-50 focus:bg-white" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Jean Dupont" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Adresse Email</label>
                        <input id="email" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors bg-gray-50 focus:bg-white" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="jean.dupont@exemple.com" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Phone -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
                        <input id="phone" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors bg-gray-50 focus:bg-white" type="tel" name="phone" :value="old('phone')" required placeholder="06 12 34 56 78" />
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                        <input id="password" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors bg-gray-50 focus:bg-white" type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmer mot de passe</label>
                        <input id="password_confirmation" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors bg-gray-50 focus:bg-white" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="w-full flex justify-center items-center py-3.5 px-4 border border-transparent rounded-xl shadow-sm text-base font-bold text-white bg-slate-900 hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-900 transition-all transform active:scale-95">
                            Créer mon compte
                        </button>
                    </div>
                </form>

                <div class="mt-6 text-center text-sm text-gray-600">
                    Déjà un compte ? 
                    <a href="{{ route('login') }}" class="font-bold text-emerald-600 hover:text-emerald-500 transition-colors">Connectez-vous</a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
