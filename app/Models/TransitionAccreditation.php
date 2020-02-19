<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransitionAccreditation extends Model
{
    protected $guarded = [];

    public function accreditations()
    {
        return $this->hasMany(Accreditation::class);
    }
}
