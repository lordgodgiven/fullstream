<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeCritereIndicateur extends Model
{

    protected $guarded = [];

    public function ligne_notation()
    {
        return $this->hasMany(LigneNotation::class);
    }
}
