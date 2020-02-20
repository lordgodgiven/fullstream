<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DossierBeneficiaire extends Model
{

    protected $guarded = [];


    public function notation_beneficiaires()
    {
        return $this->hasMany(NotationBeneficiaire::class);
    }

    public function membre_clusters()
    {
        return $this->hasMany(MembreCluster::class);
    }

    public function eligibilite_beneficiaires()
    {
        return $this->hasMany(EligibiliteBeneficiaire::class);
    }

    public function compte_utilisateurs()
    {
        return $this->belongsTo(CompteUtilisateur::class);
    }

    public function competence_informatiques()
    {
        return $this->hasMany(CompetenceInfoBeneficiaire::class);
    }

    public function domaine_competence_beneficiaires()
    {
        return $this->hasMany(DomaineComptenceBeneficiaire::class);
    }

    public function reference_client_beneficiaires()
    {
        return $this->hasMany(ReferenceClientBeneficiaire::class);
    }

    public function sanction_beneficiaires()
    {
        return $this->hasMany(SanctionBeneficiaire::class);
    }

    public function competence_linguistique_beneficiaires()
    {
        return $this->hasMany(CompetenceLinBeneficiaire::class);
    }

    public function pays_nationalite()
    {
        return $this->belongsTo(PaysNationalite::class);
    }

    public function commune_ville()
    {
        return $this->belongsTo(CommuneVille::class);
    }

    public function activite_principale()
    {
        return $this->belongsTo(ActivitePrincipale::class);
    }

    public function secteur_domaine_activite()
    {
        return $this->belongsTo(SecteurDomaineActivite::class);
    }


}
