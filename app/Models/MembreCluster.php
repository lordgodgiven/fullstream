<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MembreCluster extends Model
{

    protected $guarded = [];

    public function cluster()
    {
        return $this->belongsTo(Cluster::class);
    }

    public function role_membre_cluster()
    {
        return $this->belongsTo(RoleMembreCluster::class);
    }

    public function dossier_beneficiaire()
    {
        return $this->belongsTo(DossierBeneficiaire::class);
    }
}
