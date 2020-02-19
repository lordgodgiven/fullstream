<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mention extends Model
{
    protected $guarded = [];

    public function accreditation()
    {
        return $this->hasMany(Accreditation::class);
    }
}
