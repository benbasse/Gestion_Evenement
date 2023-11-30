<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\ClientAuthController;
use App\Http\Controllers\AssociationController;
use App\Http\Controllers\ReservationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//Associations
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('ajouter', [EvenementController::class,'index'])->name('events');
    Route::get('liste', [EvenementController::class,'show'])->name('showEvents');
    Route::post('ajouter', [EvenementController::class,'store'])->name('ajouter_evenement');
    Route::delete('ajouter/{id}', [EvenementController::class,'destroy'])->name('delete');
    Route::get('modifier/{id}', [EvenementController::class,'edit'])->name('edit');
    Route::post('modifier/{id}', [EvenementController::class,'update'])->name('modifier');
    Route::get('listeClients', [ClientController::class,'show'])->name('clients');

});
// Événemet
Route::get('/', [EvenementController::class,'showFront'])->name('showEventsFront');

//Clients
Route::get('form', [ClientController::class,'index'])->name('inscription');
Route::get('connexion', [ClientController::class,'connexion'])->name('connexion');
Route::post('form', [ClientController::class,'store']);

//Verification clients
// Route::get('form', [ClientAuthController::class,'form']);
Route::post('/client/logout', [ClientAuthController::class, 'logout'])->name('client.logout');
Route::post('connexions', [ClientAuthController::class, 'login'])->name('connexions');

//Route pour les réservation
Route::post('/reserver/{evenement_id}', [ReservationController::class, 'reserver'])
    // ->middleware('auth:client') 
    ->name('reserver');
Route::get('listeClients', [ReservationController::class,'index'])->name('client_reserver');
Route::post('update/{id}', [ReservationController::class, 'edit'])->name('update');

require __DIR__.'/auth.php';
