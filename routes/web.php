<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DepenceController;
use App\Http\Controllers\SalaireController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\MoniteurController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\ApprenantController;
use App\Http\Controllers\ListInscriController;
use App\Http\Controllers\ParticiperController;

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
Route::get('/', [PostController::class, 'first'])->name('first');

Route::get('/home', [PostController::class, 'index'])->name('home')->middleware('auth');

Route::get('/form', [ApprenantController::class, 'inscription1'])->name('inscription')->middleware(['auth', 'verified']);
Route::post('/forms',[ApprenantController::class, 'store'])->name('apprenant.store');
Route::delete('/apprenant/{apprenant}',[ApprenantController::class, 'destroy'])->name('apprenant.delete');

Route::get('/list_insc', [ListInscriController::class, 'liste_inscrit'])->name('list_ins')->middleware('auth');

Route::get('/moniteurs', [MoniteurController::class, 'index'])->name('moniteur')->middleware('auth');
Route::post('/moniteur',[MoniteurController::class, 'store'])->name('moniteur.stores');
Route::put('/moniteur',[MoniteurController::class, 'update'])->name('moniteur.update');//moniteur.delete
Route::delete('/moniteur/{moniteur}',[MoniteurController::class, 'destroy'])->name('moniteur.delete');
Route::get('/moniteur/{moniteur}/edit',[MoniteurController::class, 'edit'])->name('moniteur.edit');

Route::get('/paiements', [PaiementController::class, 'paiement'])->name('paiement')->middleware('auth');
Route::post('/paiement',[PaiementController::class, 'store'])->name('paiement.store');

Route::get('/depences', [DepenceController::class, 'depences'])->name('depence')->middleware('auth');
Route::post('/depence',[DepenceController::class, 'store'])->name('depence.store');

Route::get('/sessions', [SessionController::class, 'session'])->name('session')->middleware('auth');
Route::post('/session',[SessionController::class, 'store'])->name('session.store');
Route::get('edit/{id}',[SessionController::class, 'edit'])->name('session.edit');
Route::delete('/session/{session}',[SessionController::class, 'destroy'])->name('session.delete');
//Route::get('/session/{session}/edit',[SessionController::class, 'edit'])->name('session.edit');
//Route::delete('/session/{session}',[SessionController::class, 'destroy'])->name('session.delete');
//Route::put('/session',[SessionController::class, 'update'])->name('session.update');

Route::get('/participers', [ParticiperController::class, 'participer'])->name('participer')->middleware('auth');
Route::post('/participer', [ParticiperController::class, 'store'])->name('participer.store');

Route::get('/fiche_payes', [SalaireController::class, 'ficheSalaire'])->name('fiche_paye')->middleware('auth');
Route::post('/fiche_paye', [SalaireController::class, 'store'])->name('fiche_paye.store');

Route::get('/tbl', [PostController::class, 'tbl_bootstrap'])->name('tableau')->middleware('auth');

Route::get('/sampleP', [PostController::class, 'sample_page'])->name('sample')->middleware('auth');

Route::get('/programmer_cour', [CourController::class, 'pgr_cour'])->name('pgr-cour')->middleware('auth');
Route::post('/programmer_cours',[CourController::class, 'store'])->name('pgr_cour.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
