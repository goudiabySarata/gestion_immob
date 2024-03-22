<?php

use App\Http\Controllers\admin\BienImmobilierController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\OptionController;
use App\Http\Controllers\admin\ProprietaireControler;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfilClientController;
use App\Http\Controllers\VisiteController;
use Illuminate\Support\Facades\Auth;
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



$idRegex = '[0-9]+';
$slugRegex = '[a-zA-Z0-9\-]+';
Route::get('/',[MainController::class, 'index'])->name('index');
Route::get('/bien/{slug}-{bien}', [MainController::class, 'show'])->name('bien.show')->where(['slug' => $slugRegex, 'bien' => $idRegex]);
Route::get('/location', [MainController::class, 'location'])->name('location');
Route::get('/location/{slug}-{bien}', [MainController::class, 'show'])->name('location.show')->where(['slug' => $slugRegex, 'bien' => $idRegex]);
Route::get('/vente', [MainController::class, 'vente'])->name('vente');
Route::get('/vente/{slug}-{bien}', [MainController::class, 'show'])->name('vente.show')->where(['slug' => $slugRegex, 'bien' => $idRegex]);
Route::post('/bien/{bien}/contact', [MainController::class, 'contact'])->middleware('auth')
    ->name('contact')
    ->where(['bien' => $idRegex]);
Route::post('store', [VisiteController::class, 'visiteStore'])->name('visite.store');
Route::get('/contact', [MainController::class, 'nousContacter'])->name('contact');
Route::prefix('auth')->name('auth.')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
});

Auth::routes();
Route::get('/admin', [LoginController::class, 'showLoginForm'])->name('adminLogin');
Route::post('/admin', [LoginController::class, 'login']);

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('/dashbord', [AdminController::class, 'index'])->name('dashbord');
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::get('/clients', [AdminController::class, 'client'])->name('client');
    Route::get('/contrats', [AdminController::class, 'contrat'])->name('contrat');
    Route::resource('proprietaire', ProprietaireControler::class)->except('show');
    Route::resource('biens', BienImmobilierController::class)->except('show');
    Route::resource('options', OptionController::class)->except('show');
    Route::get('/visites', [AdminController::class, 'homeVisite'])->name('visite.index');
    Route::delete('/{visite}/delete', [AdminController::class, 'destroy'])->name('visite.destroy');
    Route::get('/{visite}/detail', [AdminController::class, 'viewDetails'])->name('visite.detail');
});

Route::group(['prefix' => 'client', 'middleware' => 'auth'], function () {
    Route::get('/profil/{client}', [ProfilClientController::class, 'showProfil'])->name('profilClient');
    Route::post('/update/{client}', [ProfilClientController::class, 'update'])->name('updateProfil');
});
