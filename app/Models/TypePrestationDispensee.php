<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypePrestationDispensee extends Model
{
    protected $guarded = [];
    protected $with = ['famille_intervention', 'sous_categorie'];

    public function dossier_prestataire()
    {
        return $this->belongsTo(DossierPrestataire::class);
    }

    public function famille_intervention()
    {
        return $this->belongsTo(FamilleIntervention::class);
    }

    public function sous_categorie()
    {
        return $this->belongsTo(SousCategorie::class);

    }


}
