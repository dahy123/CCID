<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activites extends Model
{
    use HasFactory;
    protected $fillable = [
        "nom",
        'description'
    ];

    public function operateurs()
    {
        return $this->hasMany(Operateurs::class);
    }

}
