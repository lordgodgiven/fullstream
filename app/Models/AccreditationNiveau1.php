<?php

namespace App\Models;


class AccreditationNiveau1 extends Accreditation
{


    protected $guarded = [];
    protected $with = ['accreditation'];

    public function accreditation()
    {
        return $this->belongsTo(Accreditation::class)->withDefault();
    }

    public function attestation_accreditation()
    {
        return $this->belongsTo(AttestationAccreditation::class)->withDefault();
    }

}
