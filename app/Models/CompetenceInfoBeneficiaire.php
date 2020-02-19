<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompetenceInfoBeneficiaire extends Model
{
    protected $guarded = [];

    public function dossier_beneficiaire()
    {
        return $this->belongsTo(DossierBeneficiaire::class);
    }

    public function niveau_maitrise()
    {
        return $this->belongsTo(NiveauMaitrise::class);
    }
}
