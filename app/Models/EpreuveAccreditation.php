<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EpreuveAccreditation extends Model
{
    protected $guarded = [];

    public function accreditation()
    {
        return $this->belongsTo(Accreditation::class);
    }
}
