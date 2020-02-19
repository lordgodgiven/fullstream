<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttestationAccreditation extends Model
{

    protected $guarded = [];

    public function accreditation()
    {
        return $this->belongsTo(Accreditation::class);
    }

    public function accreditation_niveau2s()
    {
        return $this->hasMany(AccreditationNiveau2::class);
    }

    public function accreditation_niveau3s()
    {
        return $this->hasMany(AccreditationNiveau3::class);
    }

    public function accreditation_niveau1s()
    {
        return $this->hasMany(AccreditationNiveau1::class);
    }
}
