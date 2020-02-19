<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EligibiliteOffrePrestation extends Model
{
    protected $guarded = [];

    public function offre_prestation()
    {
        return $this->belongsTo(OffrePrestation::class);
    }

    public function visa_decision()
    {
        return $this->belongsTo(VisaDecision::class);
    }

    public function appreciations()
    {
        return $this->belongsTo(Appreciation::class);
    }
}
