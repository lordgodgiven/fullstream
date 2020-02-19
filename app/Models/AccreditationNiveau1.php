<?php

namespace App\Models;


class AccreditationNiveau1 extends Accreditation
{

    protected $guarded = [];

    public function accreditation()
    {
        return $this->belongsTo(Accreditation::class);
    }

    public function atestation_accreditation()
    {
        return $this->belongsTo(AttestationAccreditation::class);
    }

}
