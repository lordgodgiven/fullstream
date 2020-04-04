<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class DemandePrestation extends Model
{

    protected $guarded = [];
    protected $with = ['dossier_beneficiaire', 'famille_intervention', 'cluster'];
    protected $dates = ['date_creation'];

    public function tdrs()
    {
        return $this->hasMany(Tdr::class);
    }

    public function dossier_beneficiaire()
    {
        return $this->belongsTo(DossierBeneficiaire::class)->withDefault();
    }

    public function zone_intervention()
    {
        return $this->belongsTo(ZoneIntervention::class)->withDefault();
    }

    public function famille_intervention()
    {
        return $this->belongsTo(FamilleIntervention::class)->withDefault();
    }

    public function type_demande()
    {
        return $this->belongsTo(TypeDemande::class)->withDefault();
    }

    public function cluster()
    {
        return $this->belongsTo(Cluster::class)->withDefault();
    }

    public function getDateCreationAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }
}
