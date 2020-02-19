<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemandePrestation extends Model
{

    protected $guarded = [];

    public function tdrs()
    {
        return $this->hasMany(Tdr::class);
    }
}
