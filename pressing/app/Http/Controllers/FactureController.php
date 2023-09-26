<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Facture;
use App\Models\Tarification;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    //

    public function pageFacturePartiel(){
        $lesfactures = Facture::where(function ($query) {
            // Sécurisation pour éviter des résultats inattendus
            $query->whereRaw('total - paiement > 0') // je verifie ici que la différence est positive
                ->whereRaw('total != paiement'); // ici que le total n'est pas égal au paiement
        })->get();

        return view('admin.facturesPartiels', compact('lesfactures'));
    }
    public function pageFacturePaye(){
        $lesfactures = Facture::where(function ($query) {
            // Sécurisation pour éviter des résultats inattendus
            $query->whereRaw('total - paiement = 0'); // je verifie ici que la différence est positive
                // ->whereRaw('total = paiement'); // ici que le total n'est pas égal au paiement
        })->get();

        return view('admin.facturesComplete', compact('lesfactures'));
    }

    public function addPageFacture(){
        $tarifications = Tarification::all();
        $clients = Client::all();
        return view('admin.addFacture', compact('tarifications','clients'));
    }

    public function addFactureAction(Request $request){
        //création de facture pour le client

        $request->validate([
            "nomclient" => "required",
            "tarification" => "required|array",
            "quantite" => "required|array",
            "paiement" => "nullable",
            "remise" => "nullable",
            "total_facture"=>"required",
            "daterecup" => "required",
            "heurerecup" => "required",
        ]);

        $codeFacture = "FACT".rand(1000,9999);
        $tarifselect = $request->input('tarification', []);
        $libelletarifs = $request->input('libtarif', []); 
        $quantites = $request->input('quantite', []);


        Facture::create([
            "codefacture" => $codeFacture,
            "tarification" => implode(",", $tarifselect),
            "libtarif" => implode(",", $libelletarifs),
            "quantites" => implode(",", $quantites),
            "nomclient" => $request->nomclient,
            "paiement" => $request->paiement,
            "remise" => $request->remise,
            "daterecup" =>$request->daterecup,
            "heurerecup" =>$request->heurerecup,
            "total" =>$request->total_facture,
        ]);

        return redirect()->route('imprimer.facture',['client'=>$codeFacture])->with('success', "nouvelle facture ajouter au client");
    }

    public function factureModeImpression($client){
        $infoFacture = Facture::where('codefacture', $client)->first();
        return view('fact.info', compact('infoFacture'));
    }
}
