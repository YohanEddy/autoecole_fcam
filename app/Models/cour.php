<?php

namespace App\Models;

use App\Models\moniteur;
use App\Models\participer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class cour extends Model
{
    use HasFactory;

    public function moniteur()
    {
        return $this->belongsToMany(moniteur::class, 'dispenser');
    }

    public function participer()
    {
        return $this->hasMany(participer::class);
    }
}
