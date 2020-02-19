<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DossierPrestataire extends Model
{


    protected $guarded = [];


    public function competence_informatique_experts()
    {
        return $this->hasMany(CompetenceInfoExpert::class);
    }

    public function competence_linguistique_experts()
    {
        return $this->hasMany(CompetenceLinExpert::class);
    }

    public function experience_chaine_valeur_experts()
    {
        return $this->hasMany(ExperienceChaineValeurExpert::class);
    }

    public function offre_prestations()
    {
        return $this->hasMany(OffrePrestation::class);
    }

    public function reference_client_experts()
    {
        return $this->hasMany(ReferenceClientExpert::class);
    }

    public function eligilite_prestataire()
    {
        return $this->hasMany(EligibilitePrestataire::class);
    }

    public function type_prestation_dispensees()
    {
        return $this->hasMany(TypePrestationDispensee::class);
    }

    public function employeur()
    {
        return $this->hasMany(Employeur::class);
    }

    public function accreditations()
    {
        return $this->hasMany(Accreditation::class);
    }

    public function sanction_prestataires()
    {
        return $this->hasMany(SanctionPrestataire::class);
    }

    public function disponibilite()
    {
        return $this->belongsTo(Disponibilite::class);
    }

    public function individu()
    {
        return $this->belongsTo(Individu::class);
    }

    public function type_expert()
    {
        return $this->belongsTo(TypeExpert::class);
    }

    public function zone_intervention()
    {
        return $this->belongsTo(ZoneIntervention::class);
    }

    public function notation_beneficiaires()
    {
        return $this->hasMany(NotationBeneficiaire::class);
    }

    public function compte_utilisateur()
    {
        return $this->belongsTo(CompteUtilisateur::class);
    }

    public function famille_intervention()
    {
        return $this->belongsTo(FamilleIntervention::class);
    }
}
