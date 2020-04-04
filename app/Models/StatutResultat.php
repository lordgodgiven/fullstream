<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatutResultat extends Model
{


    protected $guarded=[];



    public function resultat_projets()
    {
        return $this->hasMany(ResultatProjet::class);
    }
}
