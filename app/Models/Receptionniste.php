<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receptionniste extends Model implements Authenticatable
{
    use BasicAuthenticatable;
    use HasFactory;

    protected $table = 'receptionnistes';

    protected $fillable =["nom_receptin", "identifiant", "contact_receptin", "password"];
}
