<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SituationStructure extends Model
{

    protected $guarded = [];

    public function dossier_beneficiaires()
    {
        return $this->hasMany(DossierBeneficiaire::class);
    }
}
