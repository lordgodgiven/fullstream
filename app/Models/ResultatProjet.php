<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResultatProjet extends Model
{

    protected $guarded=[];
    protected $with=['statut_resultat'];


    public function activite_projets()
    {
        return $this->hasMany(ActiviteProjet::class);
    }

    public function statut_resultat()
    {
        return $this->belongsTo(StatutResultat::class)->withDefault();
    }
}
