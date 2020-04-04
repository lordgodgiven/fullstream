<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActiviteProjet extends Model
{

    protected $guarded=[];
    protected $with=['resultat_projet'];


    public function resultat_projet()
    {
        return $this->belongsTo(ResultatProjet::class)->withDefault();
    }
}
