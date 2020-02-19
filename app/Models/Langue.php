<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Langue extends Model
{

    protected $guarded = [];


    public function competence_linguistique_experts()
    {
        return $this->hasMany(CompetenceLinExpert::class);
    }

    public function competence_linguistique_beneficiaires()
    {
        return $this->hasMany(CompetenceLinBeneficiaire::class);
    }
}
