<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Adhesion extends Model
{


    protected $guarded = [];
    protected $with = ['role_membre_cluster', 'dossier_beneficiaire', 'cluster'];
    protected $dates = ['date_entree', 'date_sortie'];


    public function role_membre_cluster()
    {
        return $this->belongsTo(RoleMembreCluster::class)->withDefault();
    }

    public function dossier_beneficiaire()
    {
        return $this->belongsTo(DossierBeneficiaire::class)->withDefault();
    }

    public function membre_beneficiaire()
    {
        return $this->belongsTo(DossierBeneficiaire::class)->withDefault();
    }

    public function responsable_beneficiaire()
    {
        return $this->belongsTo(DossierBeneficiaire::class)->withDefault();
    }

    public function cluster()
    {
        return $this->belongsTo(Cluster::class)->withDefault();
    }

    public function getDateEntreeAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }

    public function getDateSortieAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }
}
