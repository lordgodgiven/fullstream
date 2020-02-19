<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SousCategorieFamilleIntervention extends Model
{
    protected $guarded = [];

    public function famille_intervention()
    {
        return $this->belongsTo(FamilleIntervention::class);
    }
}
