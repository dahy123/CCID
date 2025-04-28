<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operateurs extends Model
{
    use HasFactory;
    protected $fillable = [
        'photo',
        'nom',
        'adresse',
        'contact',
        'email',
        'type',
        'raison',
        'formel',
        'nif',
        'stat',
        'rc',
        'activites_id'
    ];

    public function activites(){
        return $this->belongsTo(Activites::class);
    }

}
