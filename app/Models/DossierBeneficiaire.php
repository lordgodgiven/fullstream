<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class DossierBeneficiaire extends Model
{

    protected $guarded = [];
    protected $with = ['pays_nationalite', 'quartier',
        'activite_principale', 'secteur_juridique',
        'commune_ville', 'departement', 'arrondissement', 'situation_structure'];


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

    public function compte_utilisateur()
    {
        return $this->belongsTo(CompteUtilisateur::class)->withDefault();
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
        return $this->belongsTo(PaysNationalite::class)->withDefault();
    }

    public function secteur_juridique()
    {
        return $this->belongsTo(SecteurJuridique::class)->withDefault();
    }

    public function situation_structure()
    {
        return $this->belongsTo(SituationStructure::class)->withDefault();
    }

    public function arrondissement()
    {
        return $this->belongsTo(Arrondissement::class)->withDefault();
    }

    public function quartier()
    {
        return $this->belongsTo(Quartier::class)->withDefault();
    }

    public function commune_ville()
    {
        return $this->belongsTo(CommuneVille::class)->withDefault();
    }

    public function activite_principale()
    {
        return $this->belongsTo(ActivitePrincipale::class)->withDefault();
    }

    public function secteur_domaine_activite()
    {
        return $this->belongsTo(SecteurDomaineActivite::class)->withDefault();
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class)->withDefault();
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }


}
