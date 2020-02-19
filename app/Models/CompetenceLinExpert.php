<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompetenceLinExpert extends Model
{

    protected $guarded = [];

    public function dossier_prestataires()
    {
        return $this->belongsTo(DossierPrestataire::class);
    }

    public function langue()
    {
        return $this->belongsTo(Langue::class);
    }

    public function niveau_maitrise()
    {
        return $this->belongsTo(NiveauMaitrise::class);
    }

}
