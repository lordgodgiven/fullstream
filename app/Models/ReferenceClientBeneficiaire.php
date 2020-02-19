<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferenceClientBeneficiaire extends Model
{

    protected $guarded = [];

    public function dossier_beneficaire()
    {
        return $this->belongsTo(DossierBeneficiaire::class);
    }
}
