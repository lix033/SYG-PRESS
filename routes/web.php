<?php

use App\Http\Controllers\AdminController;
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
    return view('admin.login');
});
// Route::get('/', function () {
//     return view('receptionniste.loginrecptionniste');
// });

//route de l'administrateur :
Route::get('/dashboard', function(){
    return view('admin.dashboard');
})->name('dashboard.admin');

// LES ROUTE DE LA RECEPTIONNNISTE
Route::get('/connexionrecept', [ReceptionnisteController::class, 'loginpage'])->name('connexion.page.recep');
Route::post('/connexionACTIONrecept', [ReceptionnisteController::class, 'loginaction'])->name('connexion.action.recep');
Route::get('/dashreceptionniste', [ReceptionnisteController::class, 'receptdash'])->name('dashborad.recept');
Route::get('/receptionnistaddfacture', [ReceptionnisteController::class, 'addfacture'])->name('facture.recept');
Route::get('/receptionnisteaddclient', [ReceptionnisteController::class, 'addcleint'])->name('add.cleint.recept');
Route::post('/receptionaddclientaction', [ReceptionnisteController::class, 'addClientReceptAction'])->name('recept.client.add');
Route::get('/receptionistelistclient', [ReceptionnisteController::class, 'listcleint'])->name('cleint.list');
Route::get('/facturedujour', [ReceptionnisteController::class, 'jourfacture'])->name('facturedujour.liste');
Route::get('/receptionistelistfactureauj', [ReceptionnisteController::class, 'listfactureaujour'])->name('facture.jour.liste');


// LES ROUTES DE L'ADMIN LUI MEME 
Route::get('paneladmin/', [AdminController::class, 'dashadmin'])->name('dash.admin.press');
Route::post('adminconnexionact/', [AdminController::class, 'connexionAdmin'])->name('admin.press.connex');

Route::get('adminTarif/', [TarificationController::class, 'addTarifPage'])->name('page.ajout.tarif');
Route::post('adminAddTarifAction/', [TarificationController::class, 'addTarification'])->name('action.ajout.tarif');
Route::get('adminAddTarif/', [TarificationController::class, 'listTarifications'])->name('tarification.list');

Route::get('addReceptionniste/', [AdminController::class, 'addReceptin'])->name('page.ajouter.receptionniste');
Route::post('actionaddReceptionniste/', [AdminController::class, 'addReceptinAction'])->name('action.ajouter.receptionniste');
Route::get('lsitreceptionniste/', [AdminController::class, 'receptinList'])->name('liste.receptionniste');

Route::get('adminAddClient/', [ClientController::class, 'addClientPage'])->name('ajout.client');
Route::post('addClientAction/', [ClientController::class, 'addClient'])->name('action.ajout.client');
Route::post('listeClientAction/', [ClientController::class, 'listeClient'])->name('liste.action.client');

Route::post('rechercheClient/', [ClientController::class, 'rechercheClient'])->name('search.client');
// Route::get('adminClient', [ClientController::class,'addClientPage'])->name('page.ajout.client');

Route::get('facturepartiel/', [FactureController::class, 'pageFacturePartiel'])->name('page.partiel.facture');
Route::get('facturepayes/', [FactureController::class, 'pageFacturePaye'])->name('page.paye.facture');
Route::get('ajouterfacture/', [FactureController::class, 'addPageFacture'])->name('page.ajout.facture');
// Route::get('ajouterfactureparrecheclient/', [FactureController::class, 'addPageFacture'])->name('rerch.ajout.facture');
Route::post('factureajoutdb/', [FactureController::class,'addFactureAction'])->name('facture.ajout.action');

Route::get('prevewfacture/{codefacture}', [FactureController::class, 'factureModeImpression'])->name('imprimer.facture');