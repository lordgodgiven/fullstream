<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LignePropositionPrestataire extends Model
{
    protected $guarded = [];

    public function propostion_prestataire()
    {
        return $this->belongsTo(PropositionPrestataire::class);
    }
}
