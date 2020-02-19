<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DecisionEligibilite extends Model
{
    protected $guarded = [];

    public function eligibilite_prestataires()
    {
        return $this->hasMany(EligibilitePrestataire::class);
    }
}
