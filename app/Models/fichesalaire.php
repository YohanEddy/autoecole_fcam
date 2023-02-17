<?php

namespace App\Models;

use App\Models\moniteur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class fichesalaire extends Model
{
    use HasFactory;

    public function moniteur()
    {
        return $this->belongsTo(moniteur::class);
    }
}
