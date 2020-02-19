<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleMembreCluster extends Model
{

    protected $guarded = [];

    public function membre_cluster()
    {
        return $this->hasMany(MembreCluster::class);
    }

}
