<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeCompetenceInformatique extends Model
{
    protected $guarded = [];

    public function competence_informatique_experts()
    {
        return $this->hasMany(CompetenceInfoExpert::class);
    }
}
