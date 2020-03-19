<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjetCluster extends Model
{

    protected $guarded = [];
    protected $with = ['statut_projet'];

    public function cluster()
    {
        return $this->belongsTo(Cluster::class);
    }

    public function statut_projet()
    {
        return $this->belongsTo(StatutProjet::class)->withDefault();
    }

    public function risque_projets()
    {
        return $this->hasMany(RisqueProjet::class);
    }
}
