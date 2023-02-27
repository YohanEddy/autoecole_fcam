<?php

namespace App\Models;

use App\Models\moniteur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class fichesalaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_paiement',
        'periode_debut',
        'date_paiement',
        'peiode_debut',
        'periode_fin',
        'salaire_brut',
        'sal_net',
    ];
    public function moniteur()
    {
        return $this->belongsTo(moniteur::class);
    }
}
