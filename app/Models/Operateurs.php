<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Operateurs extends Model
{
    use HasFactory;
    use Notifiable;
    
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
