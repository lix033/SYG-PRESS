<?php

namespace App\Http\Controllers;

use App\Models\Receptionniste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //

    public function dashadmin(){
        return view('admin.panelvue');
    }

    public function connexionAdmin(Request $request){

        $request->validate([
            "pseudo" => "required",
            "password" => "required",
        ]);

        if(auth()->attempt($request->only('pseudo', 'password'))){
            return redirect()->route('dash.admin.press');
        }
        return redirect()->back()->withErrors("Les identifiants ne sont pas corrects.");
    }


    public function listeClient(){

    }


    public function addReceptin(){
        return view('admin.addReceptionniste');
    }

    public function receptinList(){
        $receptionnistes = Receptionniste::all();
        return view('admin.listReceptionniste', compact('receptionnistes'));
    }
    public function addReceptinAction(Request $request){
        $request->validate([
            "nom" => "required",
            "identifiant" => "required",
            "contact" => "required",
            "password" => "required",
        ]);

        Receptionniste::create([
            "nom_receptin" => $request->nom,
            "identifiant" => $request->identifiant,
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
