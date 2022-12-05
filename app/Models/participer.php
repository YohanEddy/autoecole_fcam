<?php

namespace App\Models;

use App\Models\cour;
use App\Models\session;
use App\Models\apprenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class participer extends Model
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
    public function cour()
    {
        return $this->belongsTo(cour::class);
    }
}
