<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SituationFamilliale extends Model
{


    protected $guarded = [];


    public function dossier_prestataires()
    {
        return $this->hasMany(DossierPrestataire::class);
    }
}
