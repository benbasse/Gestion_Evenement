<?php

use App\Http\Controllers\ClientAuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Associations
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// //Clients
Route::get('form', [ClientController::class,'index'])->name('form')->name('inscription');
Route::get('connexion', [ClientController::class,'connexion'])->name('connexion');
Route::post('form', [ClientController::class,'store']);

//Verification clients
// Route::get('form', [ClientAuthController::class,'form']);
Route::post('connexions', [ClientAuthController::class, 'login'])->name('connexions');


require __DIR__.'/auth.php';
