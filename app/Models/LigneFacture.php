<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneFacture extends Model
{
    use HasFactory;

    protected $fillable = [
        "nomclient", "tarification", "quantites", "avance", "remise", "daterecup", "heurerecup", "codefacture", "datefacture"
    ];
    

    // protected $table = [
    //     "nomclient", "tarification", "quantite", "avance", "remise", "total", "daterecup", "heurerecup", "codefacture"
    // ];
}
