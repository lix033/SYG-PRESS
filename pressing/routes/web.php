<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\ReceptionnisteController;
use App\Http\Controllers\TarificationController;
use App\Models\Tarification;
use Illuminate\Support\Facades\Route;

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
    return view('admin.dashboard');
});

//route de l'administrateur :
Route::get('/dashboard', function(){
    return view('admin.dashboard');
})->name('dashboard.admin');

Route::get('adminTarif/', [TarificationController::class, 'addTarifPage'])->name('page.ajout.tarif');
Route::post('adminAddTarifAction/', [TarificationController::class, 'addTarification'])->name('action.ajout.tarif');
Route::get('adminAddTarif/', [TarificationController::class, 'listTarifications'])->name('tarification.list');

Route::get('addReceptionniste/', [ReceptionnisteController::class, 'addReceptin'])->name('page.ajouter.receptionniste');
Route::post('actionaddReceptionniste/', [ReceptionnisteController::class, 'addReceptinAction'])->name('action.ajouter.receptionniste');
Route::get('lsitreceptionniste/', [ReceptionnisteController::class, 'receptinList'])->name('liste.receptionniste');

Route::get('adminAddClient/', [ClientController::class, 'addClientPage'])->name('ajout.client');
Route::post('addClientAction/', [ClientController::class, 'addClient'])->name('action.ajout.client');

Route::post('rechercheClient/', [ClientController::class, 'rechercheClient'])->name('search.client');
// Route::get('adminClient', [ClientController::class,'addClientPage'])->name('page.ajout.client');

Route::get('facturepartiel/', [FactureController::class, 'pageFacturePartiel'])->name('page.partiel.facture');
Route::get('facturepayes/', [FactureController::class, 'pageFacturePaye'])->name('page.paye.facture');
Route::get('ajouterfacture/', [FactureController::class, 'addPageFacture'])->name('page.ajout.facture');
// Route::get('ajouterfactureparrecheclient/', [FactureController::class, 'addPageFacture'])->name('rerch.ajout.facture');
Route::post('factureajoutdb/', [FactureController::class,'addFactureAction'])->name('facture.ajout.action');

Route::get('prevewfacture/{client}', [FactureController::class, 'factureModeImpression'])->name('imprimer.facture');