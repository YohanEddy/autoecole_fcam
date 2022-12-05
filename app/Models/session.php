<?php

namespace App\Models;

use App\Models\apprenant;
use App\Models\participer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class session extends Model
{
    use HasFactory;

    public function apprenants()
    {
        return $this->belongsToMany(apprenant::class, 'inscrires');
    }

    public function participer()
    {
        return $this->hasMany(participer::class);
    }
}
