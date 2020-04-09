<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{

    protected $primaryKey = 'dossier_beneficiaire_id';
    protected $guarded = [];
    protected $with = ['chaine_valeur', 'commune_ville', 'departement', 'individu', 'compte_utilisateur', 'dossier_beneficiaire'];
    protected $dates = ['date_creation'];

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

    public function chaine_valeur()
    {
        return $this->belongsTo(ChaineValeur::class)->withDefault();
    }

    public function commune_ville()
    {
        return $this->belongsTo(CommuneVille::class)->withDefault();
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class)->withDefault();
    }

    public function adhesions()
    {
        return $this->hasMany(Adhesion::class);
    }

    public function individu()
    {
        return $this->belongsTo(Individu::class)->withDefault();
    }

    public function compte_utilisateur()
    {
        return $this->belongsTo(CompteUtilisateur::class)->withDefault();
    }

    public function dossier_beneficiaire()
    {
        return $this->belongsTo(DossierBeneficiaire::class)->withDefault();
    }

    public function getDateCreationAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }

}
