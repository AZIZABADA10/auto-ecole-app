<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SeanceController;
use Illuminate\Support\Facades\Route;

// Routes Publiques
Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/nos-formations', [PublicController::class, 'formations'])->name('formations.public');

// Routes Authentifiées
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Admin & Assistante
    Route::middleware('role:admin,assistante')->group(function () {
        Route::resource('formations', FormationController::class)->except(['show']);
        Route::resource('users', UserController::class);
        Route::resource('seances', SeanceController::class);
        Route::resource('paiements', PaiementController::class);
        Route::get('/reservations/toutes', [ReservationController::class, 'indexAdmin'])->name('reservations.admin');
        Route::patch('/reservations/{reservation}/status', [ReservationController::class, 'updateStatus'])->name('reservations.updateStatus');
    });

    // Candidats
    Route::middleware('role:candidat')->group(function () {
        Route::resource('reservations', ReservationController::class)->only(['index', 'create', 'store', 'destroy']);
        Route::get('/mes-paiements', [PaiementController::class, 'indexCandidat'])->name('paiements.candidat');
    });
});

require __DIR__.'/auth.php';
