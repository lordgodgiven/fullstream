<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SousRegion extends Model
{

    protected $guarded = [];

    public function continent()
    {
        return $this->belongsTo(Continent::class);
    }
}
