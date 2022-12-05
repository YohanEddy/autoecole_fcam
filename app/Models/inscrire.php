<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inscrire extends Model
{
    use HasFactory;

    public function apprenant()
    {
        return $this->belongsTo(apprenant::class);
    }

    public function session()
    {
        return $this->belongsTo(session::class);
    }
}
