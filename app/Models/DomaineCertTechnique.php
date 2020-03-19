<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DomaineCertTechnique extends Model
{


    protected $guarded = [];


    public function epreuve_accreditations()
    {
        return $this->hasMany(EpreuveAccreditation::class);
    }
}
