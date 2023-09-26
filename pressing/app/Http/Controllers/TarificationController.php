<?php

namespace App\Http\Controllers;

use App\Models\Tarification;
use Illuminate\Http\Request;

class TarificationController extends Controller
{
    //

    public function addTarifPage(){
        return view('admin.addTarifs');
    }

    public function addTarification(Request $request){
        $request->validate([
            "libtarif" => "required",
            "prixtarif" => "required",
            "desctarif" => "required",

        ]);

        Tarification::create([
            "libtarif" => $request->libtarif,
            "prixtarif" => $request->prixtarif,
            "desctarif" => $request->desctarif,
        ]);

        return redirect()->route("tarification.list")->with("success", "Nouvelle tarification ajouter avec succès");
    }

    public function listTarifications(){
        $tarifications = Tarification::all();
        return view("admin.listTarifs", ["tarification" => $tarifications]);
    }

    public function editTarification(Request $request, $tarification){
        $request->validate([
            "libtarif" => "required",
            "prixtarif" => "required",
        ]);

        $tarification = Tarification::find($tarification);
        $tarification->libtarif = $request->libtarif;
        $tarification->prixtarif = $request->prixtarif;
        $tarification->save();

        return redirect()->route("tarification.list")->with("success", "Tarification modifiée avec succès");
    }
}
