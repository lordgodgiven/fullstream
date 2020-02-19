<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NiveauMaitrise extends Model
{

    protected $guarded = [];

    public function competence_linguistique_experts()
    {
        return $this->hasMany(CompetenceLinExpert::class);
    }

    public function competence_informatique_experts()
    {
        return $this->hasMany(CompetenceInfoExpert::class);
    }

    public function competence_linguistique_beneficiaires()
    {
        return $this->hasMany(CompetenceLinBeneficiaire::class);
    }

    public function competence_informatique_beneficiaires()
    {
        return $this->hasMany(CompetenceInfoBeneficiaire::class);
    }
}
