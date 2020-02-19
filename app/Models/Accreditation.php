<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accreditation extends Model
{
    protected $guarded = [];

    public function dossier_prestataire()
    {
        return $this->belongsTo(DossierPrestataire::class);
    }

    public function visa_decision()
    {
        return $this->belongsTo(VisaDecision::class);
    }

    public function transition_accreditation()
    {
        return $this->belongsTo(TransitionAccreditation::class);
    }

    public function appreciation()
    {
        return $this->belongsTo(Appreciation::class);
    }

    public function mention()
    {
        return $this->belongsTo(Mention::class);
    }

    public function attestation_accreditations()
    {
        return $this->hasMany(AttestationAccreditation::class);
    }
}
