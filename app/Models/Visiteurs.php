<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visiteurs extends Model
{
    use HasFactory;

    protected $fillable = [
        // "photo",
        "nom",
        "prenom",
        "email",
        "contact",
        "adresse",
        "motif",
    ];
}
