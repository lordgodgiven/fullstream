<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tdr extends Model
{

    protected $guarded = [];

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
        return $this->belongsTo(DemandePrestation::class);
    }

    public function contrats()
    {
        return $this->hasMany(Contrat::class);
    }
}
