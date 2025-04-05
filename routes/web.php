<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\LivreController; 
use App\Http\Controllers\CategorieController; 
use App\Http\Controllers\ReservationController;
 

Route::resource('livres', LivreController::class); 
Route::resource('categories', CategorieController::class); 
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Affiche les réservations de l'utilisateur connecté
Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');

// Affiche le formulaire de réservation pour un livre
Route::get('/reservations/create/{livre}', [ReservationController::class, 'create'])->name('reservations.create');

// Stocke une nouvelle réservation pour le livre sélectionné
Route::post('/reservations/{livre}', [ReservationController::class, 'store'])->name('reservations.store');

// Permet à l'utilisateur d'annuler une réservation en attente
Route::post('/reservations/{reservation}/cancel', [ReservationController::class, 'cancel'])->name('reservations.cancel');

// Pour l'administrateur : affiche toutes les réservations
Route::get('/admin/reservations', [ReservationController::class, 'manage'])->name('reservations.manage');

// Pour l'administrateur : approuve une réservation (passe le statut à "emprunte")
Route::post('/reservations/{reservation}/approve', [ReservationController::class, 'approve'])->name('reservations.approve');

// Pour l'administrateur : rejette une réservation (passe le statut à "disponible")
Route::post('/reservations/{reservation}/reject', [ReservationController::class, 'reject'])->name('reservations.reject');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
