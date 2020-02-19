<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DomaineComptenceBeneficiaire extends Model
{

    protected $guarded = [];

    public function domaine_competence_beneficiaire()
    {
        return $this->belongsTo(DossierBeneficiaire::class);
    }
}
