<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RapportMission extends Model
{

    protected $guarded = [];

    public function dossier_mise_oeuvre()
    {
        return $this->belongsTo(DossierMiseOeuvre::class);
    }
}
