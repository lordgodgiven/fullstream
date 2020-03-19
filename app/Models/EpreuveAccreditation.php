<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EpreuveAccreditation extends Model
{
    protected $guarded = [];
    protected $with = ['domaine_cert_technique'];

    public function accreditation()
    {
        return $this->belongsTo(Accreditation::class);
    }

    public function domaine_cert_technique()
    {
        return $this->belongsTo(DomaineCertTechnique::class)->withDefault();
    }
}
