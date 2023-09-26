<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected $fillable = ["codefacture", "nomclient", "tarification", "libtarif", "quantites", "paiement", "remise", "daterecup", "heurerecup", "total"];
}

