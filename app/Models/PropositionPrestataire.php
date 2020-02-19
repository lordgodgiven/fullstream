<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropositionPrestataire extends Model
{

    protected $guarded = [];

    public function tdr()
    {
        return $this->belongsTo(Tdr::class);
    }

    public function ligne_proposition_prestataire()
    {
        return $this->hasMany(Tdr::class);
    }
}
