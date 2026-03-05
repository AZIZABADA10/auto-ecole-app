@extends('layouts.public')

@section('content')
<div class="relative bg-white overflow-hidden">
    <!-- Hero Section -->
    <div class="relative pt-16 pb-32 overflow-hidden">
        <div aria-hidden="true" class="absolute inset-x-0 top-0 h-48 bg-gradient-to-b from-emerald-50 opacity-50"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="lg:grid lg:grid-cols-12 lg:gap-16 items-center">
                <div class="lg:col-span-6 text-center lg:text-left">
                    <div class="inline-flex items-center px-4 py-1.5 rounded-full bg-emerald-100/50 border border-emerald-200 text-emerald-700 text-xs font-black uppercase tracking-widest mb-8 animate-bounce">
                        N°1 de la conduite à Rabat
                    </div>
                    <h1 class="text-5xl sm:text-7xl font-black text-slate-900 leading-[1.1] tracking-tight">
                        La route du <span class="bg-clip-text text-transparent bg-gradient-to-r from-emerald-600 to-teal-500">succès</span> commence ici.
                    </h1>
                    <p class="mt-8 text-xl text-slate-500 max-w-2xl mx-auto lg:mx-0 leading-relaxed">
                        Apprenez à conduire avec les meilleurs moniteurs, sur des véhicules haute technologie. Une plateforme intelligente pour gérer votre planning en un clic.
                    </p>
                    <div class="mt-12 flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="{{ route('register') }}" class="group relative px-8 py-4 bg-slate-900 text-white rounded-2xl font-black text-lg shadow-2xl shadow-slate-200 hover:shadow-emerald-200 hover:bg-emerald-600 transition-all duration-500 overflow-hidden">
                            <span class="relative z-10 flex items-center justify-center">
                                Commencer l'aventure
                                <svg class="w-5 h-5 ml-2 group-hover:translate-x-2 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                            </span>
                        </a>
                        <a href="{{ route('formations.public') }}" class="px-8 py-4 bg-white border-2 border-slate-100 text-slate-700 rounded-2xl font-bold text-lg hover:border-emerald-500 hover:text-emerald-700 transition-all duration-300">
                            Nos Formations
                        </a>
                    </div>
                    
                    <div class="mt-12 flex items-center justify-center lg:justify-start gap-8 opacity-60 grayscale hover:grayscale-0 transition duration-500">
                        <div class="flex flex-col">
                            <span class="text-2xl font-black text-slate-900">4.9/5</span>
                            <span class="text-xs font-bold text-slate-500 uppercase">Avis Candidats</span>
                        </div>
                        <div class="w-px h-8 bg-slate-200"></div>
                        <div class="flex flex-col">
                            <span class="text-2xl font-black text-slate-900">+1.2k</span>
                            <span class="text-xs font-bold text-slate-500 uppercase">Diplômés en 2025</span>
                        </div>
                    </div>
                </div>
                
                <div class="lg:col-span-6 mt-16 lg:mt-0 relative group">
                    <div class="absolute -inset-4 bg-emerald-500/10 rounded-[4rem] transform rotate-3 scale-105 group-hover:rotate-1 transition-transform duration-500"></div>
                    <div class="relative rounded-[3rem] overflow-hidden shadow-2xl border-8 border-white ring-1 ring-slate-100">
                        <img src="https://images.unsplash.com/photo-1541899481282-d53bffe3c35d?auto=format&fit=crop&q=80&w=1200" alt="Driving Experience" class="w-full h-full object-cover transform scale-105 group-hover:scale-100 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/40 via-transparent"></div>
                    </div>
                    
                    <!-- Floating Badge -->
                    <div class="absolute -bottom-6 -left-6 bg-white p-6 rounded-3xl shadow-2xl animate-pulse">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-emerald-100 rounded-2xl flex items-center justify-center text-emerald-600">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            </div>
                            <div>
                                <p class="text-[10px] font-black uppercase tracking-widest text-slate-400">Taux de réussite</p>
                                <p class="text-xl font-black text-slate-900">98% en 2025</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div class="bg-white py-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-20 items-center">
                <div class="relative">
                    <div class="absolute -inset-4 bg-blue-500/10 rounded-[4rem] transform -rotate-3 scale-105"></div>
                    <img src="{{ asset('Learning.webp') }}" alt="Learning" class="relative rounded-[3rem] shadow-2xl border-4 border-white">
                </div>
                <div>
                    <h2 class="text-emerald-500 font-black uppercase tracking-widest text-sm mb-4">Nos Services</h2>
                    <h3 class="text-4xl font-black text-slate-900 mb-8">Un accompagnement complet vers votre réussite.</h3>
                    <div class="space-y-6 text-slate-500 font-medium">
                        <div class="flex gap-4">
                            <div class="w-6 h-6 bg-emerald-100 text-emerald-600 rounded-lg flex items-center justify-center shrink-0 mt-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            </div>
                            <p><span class="text-slate-900 font-bold">Code en ligne ILLIMITÉ</span> : Accédez à notre plateforme d'entraînement 24h/24.</p>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-6 h-6 bg-emerald-100 text-emerald-600 rounded-lg flex items-center justify-center shrink-0 mt-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            </div>
                            <p><span class="text-slate-900 font-bold">Véhicules modernes</span> : Apprenez sur des Mercedes et Volkswagen dernières générations.</p>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-6 h-6 bg-emerald-100 text-emerald-600 rounded-lg flex items-center justify-center shrink-0 mt-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            </div>
                            <p><span class="text-slate-900 font-bold">Suivi Application</span> : Visualisez vos progrès et vos points à améliorer sur votre dashboard.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="bg-slate-900 py-32 rounded-[5rem] relative z-20 border-t border-slate-800">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20 text-white">
                <h2 class="text-emerald-500 font-black uppercase tracking-widest text-sm mb-4">FAQ</h2>
                <h3 class="text-4xl font-black">Des questions ? Nous avons les réponses.</h3>
            </div>

            <div class="space-y-4" x-data="{ selected: 1 }">
                <!-- Question 1 -->
                <div class="bg-slate-800/50 border border-slate-700 rounded-2xl overflow-hidden backdrop-blur-sm transition-all duration-300" :class="selected == 1 ? 'border-emerald-500/50 ring-1 ring-emerald-500/20' : ''">
                    <button class="w-full px-8 py-6 text-left flex justify-between items-center group" @click="selected = selected == 1 ? null : 1">
                        <span class="text-lg font-bold text-white group-hover:text-emerald-400 transition-colors">Comment s'inscrire à l'auto-école ?</span>
                        <svg class="w-6 h-6 text-emerald-500 transition-transform duration-300" :class="selected == 1 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="px-8 pb-6 text-slate-400 font-medium leading-relaxed" x-show="selected == 1" x-collapse>
                        L'inscription se fait directement en ligne sur notre plateforme. Il vous suffit de créer un compte candidat, de choisir votre formation et de télécharger vos pièces justificatives. Une fois validé, vous pourrez planifier vos séances !
                    </div>
                </div>

                <!-- Question 2 -->
                <div class="bg-slate-800/50 border border-slate-700 rounded-2xl overflow-hidden backdrop-blur-sm transition-all duration-300" :class="selected == 2 ? 'border-emerald-500/50 ring-1 ring-emerald-500/20' : ''">
                    <button class="w-full px-8 py-6 text-left flex justify-between items-center group" @click="selected = selected == 2 ? null : 2">
                        <span class="text-lg font-bold text-white group-hover:text-emerald-400 transition-colors">Combien de temps dure la formation complète ?</span>
                        <svg class="w-6 h-6 text-emerald-500 transition-transform duration-300" :class="selected == 2 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="px-8 pb-6 text-slate-400 font-medium leading-relaxed" x-show="selected == 2" x-collapse x-cloak>
                        Tout dépend de votre rythme. En moyenne, nos candidats obtiennent leur permis en 2 à 4 mois. Nous proposons également des formations accélérées pour ceux qui souhaitent passer l'examen en moins de 30 jours.
                    </div>
                </div>

                <!-- Question 3 -->
                <div class="bg-slate-800/50 border border-slate-700 rounded-2xl overflow-hidden backdrop-blur-sm transition-all duration-300" :class="selected == 3 ? 'border-emerald-500/50 ring-1 ring-emerald-500/20' : ''">
                    <button class="w-full px-8 py-6 text-left flex justify-between items-center group" @click="selected = selected == 3 ? null : 3">
                        <span class="text-lg font-bold text-white group-hover:text-emerald-400 transition-colors">Quels sont les moyens de paiement acceptés ?</span>
                        <svg class="w-6 h-6 text-emerald-500 transition-transform duration-300" :class="selected == 3 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="px-8 pb-6 text-slate-400 font-medium leading-relaxed" x-show="selected == 3" x-collapse x-cloak>
                        Nous acceptons les paiements par carte bancaire, virement et espèces en agence. Vous avez également la possibilité de payer en 3 ou 4 fois sans frais pour faciliter le financement de votre permis.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="bg-white py-32 rounded-t-[5rem] -mt-16 relative z-30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-20">
                <div>
                    <h2 class="text-emerald-500 font-black uppercase tracking-widest text-sm mb-4 italic">Parlons-en</h2>
                    <h3 class="text-5xl font-black text-slate-900 leading-tight">Vous avez un projet de permis ?</h3>
                    <p class="mt-8 text-xl text-slate-500 leading-relaxed font-medium">Nos conseillers sont disponibles du lundi au samedi pour vous guider dans vos démarches administratives et le choix de votre pack.</p>
                    
                    <div class="mt-12 space-y-6">
                        <a href="tel:+212500000000" class="flex items-center gap-6 p-6 bg-slate-50 rounded-3xl border border-slate-100 hover:border-emerald-500 transition-all group">
                            <div class="w-14 h-14 bg-white rounded-2xl shadow-sm flex items-center justify-center text-emerald-500 group-hover:bg-emerald-500 group-hover:text-white transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <span class="text-2xl font-black text-slate-900">+212 5 00 00 00 00</span>
                        </a>
                        <a href="mailto:contact@autoliberte.ma" class="flex items-center gap-6 p-6 bg-slate-50 rounded-3xl border border-slate-100 hover:border-emerald-500 transition-all group">
                            <div class="w-14 h-14 bg-white rounded-2xl shadow-sm flex items-center justify-center text-emerald-500 group-hover:bg-emerald-500 group-hover:text-white transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <span class="text-2xl font-black text-slate-900">contact@autoliberte.ma</span>
                        </a>
                    </div>
                </div>
                
                <div class="bg-slate-900 p-12 rounded-[4rem] text-white shadow-3xl shadow-slate-200">
                    <h4 class="text-3xl font-black mb-8">Notre Agence</h4>
                    <p class="text-slate-400 font-medium mb-10 leading-relaxed">Retrouvez-nous au cœur de Rabat pour vos cours de code théoriques et pour rencontrer vos moniteurs.</p>
                    <div class="space-y-4 text-lg font-bold">
                        <p class="flex items-center gap-4">
                            <svg class="w-6 h-6 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            Angle Avenue Mohammed V, Rabat
                        </p>
                        <p class="flex items-center gap-4">
                            <svg class="w-6 h-6 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Lun - Sam: 09:00 - 19:00
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

