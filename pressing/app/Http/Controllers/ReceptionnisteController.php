<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Receptionniste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ReceptionnisteController extends Controller
{
    //

    public function addReceptin(){
        return view('admin.addReceptionniste');
    }

    public function receptinList(){
        $receptins = Receptionniste::all();
        return view('admin.listReceptionniste', compact('receptins'));
    }
    public function addReceptinAction(Request $request){
        $request->validate([
            "nom" => "required",
            "contact" => "required",
            "password" => "required",
        ]);

        Receptionniste::create([
            "nom_receptin" => $request->nom,
            "contact_receptin" => $request->contact,
            "password" => Hash::make($request->password),
        ]);

        return redirect()->route("liste.receptionniste")->with("success", "Nouvelle réceptionniste ajouter avec succès");
        
    }
    public function editReceptin($id){
        $receptin = Receptionniste::find($id);
        return view('receptin.edit', compact('receptin'));
    }
    public function updateReceptinAction(Request $request, $id){
        $request->validate([
            "nom" => "required",
            "contact" => "required",
        ]);

        $receptin = Receptionniste::find($id);
        $receptin->nom_receptin = $request->nom;
        $receptin->contact_receptin = $request->contact;
        $receptin->save();

        return redirect()->route("receptionniste.list")->with("success", "Modification réceptionniste avec succès");
    }

    public function deleteReceptin($id){
        $receptin = Receptionniste::find($id);
        $receptin->delete();

        return redirect()->route("receptionniste.list")->with("success", "Suppression réceptionniste avec succès");
    }

    
}

