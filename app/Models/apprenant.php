<?php

namespace App\Models;

use App\Models\session;
use App\Models\paiement;
use App\Models\participer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class apprenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nameapp',
        'prenomapp',
        'sexe',
        'datenaiss',
        'profession',
        'lieunaiss',
        'domicile',
        'nationalite',
        'telephone',
        'email',
        'attentes',
        'cnxance_centre',
        'date_inscrip',
    ];

    public function paiement()
    {
        return $this->hasMany(paiement::class);
    }

    public function sessions()
    {
        return $this->belongsToMany(session::class, 'inscrires');
    }

    public function participer()
    {
        return $this->hasMany(participer::class);
    }
}

