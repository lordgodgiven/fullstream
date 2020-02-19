<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExperienceChaineValeurExpert extends Model
{
    protected $guarded = [];

    public function dossier_prestataires()
    {
        return $this->belongsTo(DossierPrestataire::class);
    }

    public function sous_categorie()
    {
        return $this->belongsTo(SousCategorie::class);
    }

    public function famille_intervention()
    {
        return $this->belongsTo(FamilleIntervention::class);
    }
}
