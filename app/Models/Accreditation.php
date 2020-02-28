<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Accreditation extends Model
{
    protected $guarded = [];
    protected $dates = ['date_decision_accreditation'];


    public function dossier_prestataire()
    {
        return $this->belongsTo(DossierPrestataire::class)->withDefault();
    }

    public function visa_decision()
    {
        return $this->belongsTo(VisaDecision::class)->withDefault();
    }

    public function transition_accreditation()
    {
        return $this->belongsTo(TransitionAccreditation::class)->withDefault();
    }

    public function appreciation()
    {
        return $this->belongsTo(Appreciation::class)->withDefault();
    }

    public function mention()
    {
        return $this->belongsTo(Mention::class)->withDefault();
    }

    public function niveau_accreditation()
    {
        return $this->belongsTo(NiveauAccreditation::class)->withDefault();
    }

    public function attestation_accreditations()
    {
        return $this->hasMany(AttestationAccreditation::class);
    }

    public function accreditation_niveau1()
    {
        return $this->hasMany(Accreditation::class);
    }

    public function getDateDecisionAccreditationAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }


}
