<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Tdr extends Model
{

    protected $guarded = [];
    protected $with = ['dossier_beneficiaire', 'cluster', 'demande_prestation'];

    public function proposition_prestataires()
    {
        return $this->hasMany(PropositionPrestataire::class);
    }

    public function choix_approbation_prestataire_ce()
    {
        return $this->hasMany(ChoixApprobationPrestataireCe::class);
    }

    public function tdr_suivi_frais()
    {
        return $this->hasMany(TdrSuiviFrais::class);
    }

    public function tdr_suivi_livrables()
    {
        return $this->hasMany(TdrSuiviLivrable::class);
    }

    public function tdr_suivi_activites()
    {
        return $this->hasMany(TdrSuiviActivite::class);
    }

    public function demande_prestation()
    {
        return $this->belongsTo(DemandePrestation::class)->withDefault();
    }

    public function contrats()
    {
        return $this->hasMany(Contrat::class);
    }

    public function dossier_beneficiaire()
    {
        return $this->belongsTo(DossierBeneficiaire::class)->withDefault();
    }

    public function cluster()
    {
        return $this->belongsTo(Cluster::class)->withDefault();
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }


}
