<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeSanction extends Model
{

    protected $guarded = [];

    public function sanction_prestataires()
    {
        return $this->hasMany(SanctionPrestataire::class);
    }
}
