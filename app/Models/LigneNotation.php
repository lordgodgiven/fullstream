<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LigneNotation extends Model
{

    protected $guarded = [];

    public function notation_beneficiaire()
    {
        return $this->belongsTo(NotationBeneficiaire::class);
    }

    public function type_critere_indicateur()
    {
        return $this->belongsTo(TypeCritereIndicateur::class);
    }

    public function domaine_evaluation()
    {
        return $this->belongsTo(DomaineEvaluation::class);
    }
}
