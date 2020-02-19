<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motif extends Model
{
    protected $guarded = [];

    public function sanction_prestataire()
    {
        return $this->hasMany(SanctionPrestataire::class);
    }
}
