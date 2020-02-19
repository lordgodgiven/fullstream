<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisaDecision extends Model
{

    protected $guarded = [];


    public function offre_prestations()
    {
        return $this->hasMany(OffrePrestation::class);
    }

    public function eligilite_offre_prestations()
    {
        return $this->hasMany(EligibiliteOffrePrestation::class);
    }

    public function accreditations()
    {
        return $this->hasMany(Accreditation::class);
    }
}
