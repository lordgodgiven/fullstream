<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class DecisionEligibilitePrestataire extends Model
{


    protected $guarded = [];
    protected $with = ['avis_decision', 'dossier_prestataire'];


    public function avis_decision()
    {
        return $this->belongsTo(AvisDecision::class)->withDefault();
    }

    public function dossier_prestataire()
    {
        return $this->belongsTo(DossierPrestataire::class)->withDefault();
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }
}
