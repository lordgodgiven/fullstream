<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appreciation extends Model
{

    protected $guarded = [];


    public function offre_prestations()
    {
        return $this->hasMany(OffrePrestation::class);
    }

    public function accreditations()
    {
        return $this->hasMany(Accreditation::class);
    }

    public function eligibilite_offre_prestations()
    {
        return $this->hasMany(EligibiliteOffrePrestation::class);
    }
}
