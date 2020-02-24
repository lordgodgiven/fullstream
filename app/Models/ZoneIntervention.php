<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZoneIntervention extends Model
{

    protected $guarded = [];


    public function offre_prestations()
    {
        return $this->hasMany(OffrePrestation::class);
    }


    public function dossier_prestataires()
    {
        return $this->hasMany(DossierPrestataire::class);
    }
}
