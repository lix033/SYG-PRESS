<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Facture;
use App\Models\LigneFacture;
use App\Models\Receptionniste;
use App\Models\Tarification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ReceptionnisteController extends Controller
{
    //

    public function loginpage(){
        return view('receptionniste.loginrecptionniste');
    }
    public function loginaction(Request $request){
        $request->validate([
            "identifiant" => "required",
            "password" => "required",
        ]);
        
        if(Auth::guard('receptionniste')->attempt($request->only('identifiant', 'password'))){
            // session(['last_activity' => time()]);
            $receptionnisteId = Auth::guard('receptionniste')->user()->id;
            return redirect()->route('dashborad.recept',['receptId'=>$receptionnisteId]);
        }
        return redirect()->back()->withErrors('erreur de connection');
    }

    public function receptdash(){
        return view('receptionniste.dashboard');
    }
    public function addcleint(){
        return view('receptionniste.addClient');
    }
    public function addClientReceptAction(Request $request){
        $request->validate([
            "nomclient" => "required",
            "prenomclient" => "required",
            "numeroclient" => "required",
        ]);

        Client::create([
            "nomclient" =>$request->nomclient,
            "prenomclient" =>$request->prenomclient,
            "numeroclient" =>$request->numeroclient,
        ]);
        return redirect()->route("facture.recept")->with('success','Nouveau client ajouter avec succès');
    }
    public function listcleint(){
        $clients = Client::all();
        return view('receptionniste.listClients', compact('clients')); 
    }
    public function addfacture(){
        $codeFacture = "FACT" . now()->year . "-" . rand(9, 99999);
        $tarifications = Tarification::all();
        $clients = Client::all();
        return view('receptionniste.addFacture',  compact('tarifications', 'clients', 'codeFacture'));
    }

   
   

    public function listfacturejour(){

    }

    public function jourfacture(){
        $datedujour = date("Y-m-d");
        $faturesdujour = LigneFacture::WhereDate('datefacture', $datedujour)->get();

        return view('receptionniste.jourFacture', compact('faturesdujour'));
    }

    
}

