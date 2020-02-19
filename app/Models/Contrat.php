<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{

    protected $guarded = [];

    public function dossier_mise_oeuvres()
    {
        return $this->hasMany(DossierMiseOeuvre::class);
    }

    public function tdr()
    {
        return $this->belongsTo(Tdr::class);
    }
}
