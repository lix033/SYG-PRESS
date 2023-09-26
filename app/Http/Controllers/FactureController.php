<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Facture;
use App\Models\Tarification;
use App\Models\LigneFacture;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FactureController extends Controller
{
    //

    public function pageFacturePartiel()
    {
        $lesfactures = Facture::where(function ($query) {
            // Sécurisation pour éviter des résultats inattendus
            $query->whereRaw('total - paiement > 0') // je verifie ici que la différence est positive
                ->whereRaw('total != paiement'); // ici que le total n'est pas égal au paiement
        })->get();

        return view('admin.facturesPartiels', compact('lesfactures'));
    }
    public function pageFacturePaye()
    {
        $lesfactures = Facture::where(function ($query) {
            // Sécurisation pour éviter des résultats inattendus
            $query->whereRaw('total - paiement = 0'); // je verifie ici que la différence est positive
            // ->whereRaw('total = paiement'); // ici que le total n'est pas égal au paiement
        })->get();

        return view('admin.facturesComplete', compact('lesfactures'));
    }

    public function addPageFacture()
    {

        $codeFacture = "FACT" . now()->year . "-" . rand(9, 99999);
        $tarifications = Tarification::all();
        $clients = Client::all();
        return view('admin.addFacture', compact('tarifications', 'clients', 'codeFacture'));
    }

    public function addFactureAction(Request $request)
    {
        $request->validate([
            "codefacture" => "required",
            "nomclient" => "required",
            "tarification" => "required|array",
            "quantite" => "required|array",
            "paiement" => "nullable",
            "remise" => "nullable",
            "daterecup" => "required",
            "heurerecup" => "required",
        ]);

        $codeFacture = $request->codefacture;
        $nomClient = $request->nomclient;
        $paiement = $request->paiement;
        $remise = $request->remise;
        $dateFacture = date("Y-m-d");
        $dateRecup = $request->daterecup;
        $heureRecup = $request->heurerecup;

        $tarifications = $request->input('tarification', []);
        $quantites = $request->input('quantite', []);

        // dd($request->all());
        // dd($tarifications);

        $facture = Facture::create([
            "codefacture" => $codeFacture,
            // Autres champs de Facture
        ]);

        $ligneFactures = [];

        foreach ($tarifications as $index => $tarification) {
            $ligneFactures[] = [
                "nomclient" => $nomClient,
                "tarification" => $tarification,
                "quantites" => $quantites[$index],
                "avance" => $paiement,
                "remise" => $remise,
                "daterecup" => $dateRecup,
                "heurerecup" => $heureRecup,
                "codefacture" => $codeFacture,
                "datefacture" => $dateFacture,
            ];
        }

        LigneFacture::insert($ligneFactures);

        return redirect()->route('imprimer.facture', ['codefacture' => $codeFacture])->with('success', "Nouvelle facture ajoutée au client");
    }


    public function prevufactures()
    {
    }

    public function factureModeImpression($codefacture)
    {
        // $infoFacture = Facture::where('codefacture', $codefacture)->first();

        $ligneFactures = LigneFacture::where('codefacture', $codefacture)->get();
        $tarificationIds = $ligneFactures->pluck('tarification');
        
        $infotarifs = DB::table('tarifications')
            ->whereIn('id', $tarificationIds)
            ->select('libtarif', 'prixtarif')
            ->get();

            // dd($infotarifs);

            $total = 0; // Variable pour accumuler le total

            foreach ($infotarifs as $index => $tarifinfo) {
                $total += $tarifinfo->prixtarif * $ligneFactures[$index]->quantites;
            }


        return view('fact.info', compact('ligneFactures', 'infotarifs', 'total'));
    }
}
