<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EligibiliteBeneficiaire extends Model
{

    protected $guarded = [];

    public function dossier_beneficiaire()
    {
        return $this->belongsTo(DossierBeneficiaire::class);
    }
}
