<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NiveauQualification extends Model
{


    protected $guarded = [];


    public function individus()
    {
        return $this->hasMany(Individu::class);
    }
}
