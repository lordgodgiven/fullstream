<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{

    protected $guarded = [];

    public function membre_clusters()
    {
        return $this->hasMany(MembreCluster::class);
    }

    public function action_structures()
    {
        return $this->hasMany(TypeActionStructure::class);
    }

    public function projet_clusters()
    {
        return $this->hasMany(ProjetCluster::class);
    }
}
