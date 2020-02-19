<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferenceClientExpert extends Model
{
    protected $guarded = [];

    public function dossier_prestataire()
    {
        return $this->belongsTo(DossierPrestataire::class);
    }
}
