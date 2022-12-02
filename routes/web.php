<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendeurController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route pour le vendeur
Route::get('/addnewvendeurpage', [VendeurController::class, 'index'])->name('pagedajout_vendeur');
Route::post('/addnewvendeurformulaire', [VendeurController::class, 'store'])->name('formu_dajout_vendeur');

