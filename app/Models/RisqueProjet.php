<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RisqueProjet extends Model
{

    protected $guarded=[];


    public function projet_cluster()
    {
        return $this->belongsTo(ProjetCluster::class)->withDefault();
    }
}
