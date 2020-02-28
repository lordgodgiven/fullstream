<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NiveauAccreditation extends Model
{


    protected $guarded = [];

    public function accreditations()
    {
        return $this->hasMany(Accreditation::class);
    }
}
