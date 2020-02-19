<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DomaineEvaluation extends Model
{

    public function ligne_notation()
    {
        return $this->hasMany(LigneNotation::class);
    }
}
