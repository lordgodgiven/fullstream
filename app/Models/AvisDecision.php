<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvisDecision extends Model
{

    protected $guarded = [];


    public function decision_eligibilite_prestataires()
    {
        return $this->hasMany(DecisionEligibilitePrestataire::class);
    }
}
