<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourController;
use App\Http\Controllers\EtatController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DepenceController;
use App\Http\Controllers\SalaireController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\MoniteurController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\ApprenantController;
use App\Http\Controllers\ListInscriController;
use App\Http\Controllers\ParticiperController;
use App\Http\Controllers\ListApprenantController;

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

Route::get('/apprenant', [ApprenantController::class, 'inscription1'])->name('inscription')->middleware(['auth', 'verified']);
Route::post('/apprenant',[ApprenantController::class, 'store'])->name('apprenant.store');
Route::delete('/apprenant/{inscrire}',[ApprenantController::class, 'destroy'])->name('apprenant.delete');
Route::get('/apprenant/{inscrire}/edit',[ApprenantController::class, 'edit'])->name('apprenant.edit');
Route::put('/apprenant/{inscrire}',[ApprenantController::class, 'update'])->name('apprenant.update');

Route::get('/list_insc', [ListInscriController::class, 'liste_inscrit'])->name('list_ins')->middleware('auth');
Route::get('/list_app', [ListApprenantController::class, 'liste_apprenant'])->name('list_app')->middleware('auth');

Route::get('/etat_moniteur', [EtatController::class, 'moniteur'])->name('etat_moniteur')->middleware('auth');
Route::get('/etat_salaire', [EtatController::class, 'salaire'])->name('etat_salaire')->middleware('auth');
Route::get('/etat_session', [EtatController::class, 'session'])->name('etat_session')->middleware('auth');
Route::get('/etat_apprenant', [EtatController::class, 'apprenant'])->name('etat_apprenant')->middleware('auth');
Route::get('/etat_depense', [EtatController::class, 'depense'])->name('etat_depense')->middleware('auth');
Route::get('/etat_cour', [EtatController::class, 'cour'])->name('etat_cour')->middleware('auth');
Route::get('/etat_paiement', [EtatController::class, 'paiement'])->name('etat_paiement')->middleware('auth');
Route::get('/etat_pgrm_cour', [EtatController::class, 'participer'])->name('etat_pgrm_cour')->middleware('auth');
Route::get('/etat_inscrit', [EtatController::class, 'inscrit'])->name('etat_inscrit')->middleware('auth');

Route::get('/moniteurs', [MoniteurController::class, 'index'])->name('moniteur')->middleware('auth');
Route::post('/moniteur',[MoniteurController::class, 'store'])->name('moniteur.stores');
Route::put('/moniteur/{moniteur}',[MoniteurController::class, 'update'])->name('moniteur.update');//moniteur.delete
Route::delete('/moniteur/{moniteur}',[MoniteurController::class, 'destroy'])->name('moniteur.delete');
Route::get('/moniteur/{moniteur}/edit',[MoniteurController::class, 'edit'])->name('moniteur.edit');

Route::get('/paiements', [PaiementController::class, 'paiement'])->name('paiement')->middleware('auth');
Route::post('/paiement',[PaiementController::class, 'store'])->name('paiement.store');
Route::get("/paiement/{id}", [PaiementController::class, 'show'])->name('paiement.show');
Route::get('/paiement/{paiement}/edit',[PaiementController::class, 'edit'])->name('paiement.edit');
Route::put('/paiement/{paiement}', [PaiementController::class, 'update'])->name('paiement.update');
Route::delete('/paiement/{paiement}',[PaiementController::class, 'destroy'])->name('paiement.delete');

Route::get('/depences', [DepenceController::class, 'depences'])->name('depence')->middleware('auth');
Route::post('/depence',[DepenceController::class, 'store'])->name('depence.store');
Route::get('/depence/{depence}/edit',[DepenceController::class, 'edit'])->name('depence.edit');
Route::put('/depence/{depence}',[DepenceController::class, 'update'])->name('depence.update');
Route::post('/depence/{id}',[DepenceController::class, 'destroy'])->name('depence.delete');

Route::get('/sessions', [SessionController::class, 'session'])->name('session')->middleware('auth');
Route::post('/session', [SessionController::class, 'store'])->name('session.store');
Route::get('/session/{session}/edit',[SessionController::class, 'edit'])->name('session.edit');
Route::post('/session/{id}',[SessionController::class, 'destroy'])->name('session.delete');
Route::put('/session/{session}',[SessionController::class, 'update'])->name('session.update');

Route::get('/participers', [ParticiperController::class, 'participer'])->name('participer')->middleware('auth');
Route::post('/participer', [ParticiperController::class, 'store'])->name('participer.store');
Route::get('/participer/{participer}/edit',[ParticiperController::class, 'edit'])->name('participer.edit');
Route::put('/participer/{participer}',[ParticiperController::class, 'update'])->name('participer.update');
Route::delete('/participer/{participer}',[ParticiperController::class, 'destroy'])->name('participer.delete');

Route::get('/fiche_payes', [SalaireController::class, 'index'])->name('fiche_paye')->middleware('auth');
Route::post('/fiche_paye', [SalaireController::class, 'store'])->name('fiche_paye.store');
Route::put('/fichsalaire/{fichesalaire}',[SalaireController::class, 'update'])->name('fiche_paye.update');//moniteur.delete
Route::delete('/fichesalaire/{fichesalaire}',[SalaireController::class, 'destroy'])->name('fiche_paye.delete');
Route::get('/fichesalaire/{fichesalaire}/edit',[SalaireController::class, 'edit'])->name('fiche_paye.edit');


Route::get('/sampleP', [PostController::class, 'sample_page'])->name('sample')->middleware('auth');
Route::get('/layout_hoz', [PostController::class, 'layout'])->name('layout_horizontal')->middleware('auth');

Route::get('/cours', [CourController::class, 'cour'])->name('cour')->middleware('auth');
Route::post('/cour',[CourController::class, 'store'])->name('cour.store');
Route::get('/cour/{cour}/edit',[ CourController::class, 'edit'])->name('cour.edit');
Route::put('/cour/{cour}',[ CourController::class, 'update'])->name('cour.update');
Route::delete('/cour/{cour}',[ CourController::class, 'destroy'])->name('cour.delete');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
