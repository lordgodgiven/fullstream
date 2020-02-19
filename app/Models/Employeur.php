<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employeur extends Model
{
    protected $guarded = [];

    public function dossier_prestataire()
    {
        return $this->belongsTo(DossierPrestataire::class);
    }

    public function pays_nationalite()
    {
        return $this->belongsTo(PaysNationalite::class);
    }

    public function type_employeur()
    {
        return $this->belongsTo(TypeEmployeur::class);
    }
}
