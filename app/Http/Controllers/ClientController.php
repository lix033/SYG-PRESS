<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //

    public function addClientPage(){
        return view('admin.addClient');
    }

    public function addClient(Request $request){
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
        return redirect()->route("page.ajout.facture")->with('success','Nouveau client ajouter avec succès');
    }

    public function listClient(){
            $clients = Client::all();
            return view('client',compact('clients'));
        }
}
