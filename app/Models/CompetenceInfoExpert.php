<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompetenceInfoExpert extends Model
{
    protected $guarded = [];


    public function dossier_prestataire()
    {
        return $this->belongsTo(DossierPrestataire::class);
    }

    public function niveau_maitrise()
    {
        return $this->belongsTo(NiveauMaitrise::class);
    }

    public function type_competence_informatique()
    {
        return $this->belongsTo(TypeCompetenceInformatique::class);
    }

}
