<?php

namespace App\Models;

use App\Models\apprenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class paiement extends Model
{
    use HasFactory;

    public function apprenant()
    {
        return $this->belongsTo(apprenant::class);
    }
}
