<?php

namespace App\Models;

use App\Models\cour;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class moniteur extends Model
{
    use HasFactory;


    public function cour()
    {
        return $this->belongsToMany(cour::class, 'dispenser');
    }

    protected $fillable = ['name'];
}
