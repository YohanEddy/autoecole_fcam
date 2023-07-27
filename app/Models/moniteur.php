<?php

namespace App\Models;

use App\Models\cour;
use App\Models\fichesalaire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class moniteur extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricule',
        'nom_moniteur',
        'prenom_moniteur',
        'sexe',
        'date_naiss',
        'date_arrive',
        'domicile_moniteur',
        'telephone',
        'nationalite',
        'email',
        'lieunaiss',
    ];



    public function fichesalaire()
    {
        return $this->hasMany(fichesalaire::class, 'matricule');
    }


    public function cour()
    {
        return $this->belongsToMany(cour::class, 'dispenser');
    }

    
}
