<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\HomeController;

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// ======================== ADMIN ========================
Route::middleware(['auth', 'admin'])->group(function () {
    // Routes réservées aux administrateurs
    Route::resource('users', AdminUserController::class);
    Route::resource('categories', CategorieController::class);
    Route::resource('livres', LivreController::class);


    // Dashboard admin
    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');

    // Gérer les réservations
    Route::get('/reservations', [ReservationController::class, 'manage'])->name('reservations.manage');
    Route::post('/reservations/{reservation}/approve', [ReservationController::class, 'approve'])->name('reservations.approve');
    Route::post('/reservations/{reservation}/reject', [ReservationController::class, 'reject'])->name('reservations.reject');
});

// ======================== UTILISATEUR ========================
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/livres', [LivreController::class, 'index'])->name('livres.index');
    Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');

    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::get('/reservations/create/{livre}', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/reservations/{livre}', [ReservationController::class, 'store'])->name('reservations.store');
    Route::post('/reservations/{reservation}/cancel', [ReservationController::class, 'cancel'])->name('reservations.cancel');

    Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
    Route::put('/profile', [UserProfileController::class, 'update'])->name('user.profile.update');
});
