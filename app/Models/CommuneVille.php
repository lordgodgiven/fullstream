<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommuneVille extends Model
{

    protected $guarded = [];

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function pays_nationalite()
    {
        return $this->belongsTo(PaysNationalite::class);
    }

    public function dossier_beneficiaires()
    {
        return $this->hasMany(DossierBeneficiaire::class);
    }
}
