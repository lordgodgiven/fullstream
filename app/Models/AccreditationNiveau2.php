<?php

namespace App\Models;


class AccreditationNiveau2 extends Accreditation
{

    protected $guarded = [];


    public function accreditation()
    {
        return $this->belongsTo(Accreditation::class);
    }

    public function attestation_accreditation()
    {
        return $this->belongsTo(AttestationAccreditation::class);
    }
}
