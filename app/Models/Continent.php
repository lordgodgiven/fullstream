<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    protected $guarded = [];

    public function sous_regions()
    {
        return $this->hasMany(SousRegion::class);
    }
}
