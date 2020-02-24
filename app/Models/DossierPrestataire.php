<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DossierPrestataire extends Model
{


    protected $guarded = [];
    protected $with = ['disponibilite',
        'type_prestation_dispensees', 'situation_familliale',
        'individu', 'commune_ville', 'departement'];


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
        return $this->belongsTo(Disponibilite::class)->withDefault();
    }

    public function individu()
    {
        return $this->belongsTo(Individu::class)->withDefault();
    }

    public function type_expert()
    {
        return $this->belongsTo(TypeExpert::class)->withDefault();
    }

    public function zone_intervention()
    {
        return $this->belongsTo(ZoneIntervention::class)->withDefault();
    }

    public function notation_beneficiaires()
    {
        return $this->hasMany(NotationBeneficiaire::class);
    }

    public function compte_utilisateur()
    {
        return $this->belongsTo(CompteUtilisateur::class)->withDefault();
    }

    public function commune_ville()
    {
        return $this->belongsTo(CommuneVille::class)->withDefault();
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class)->withDefault();
    }

    public function situation_familliale()
    {
        return $this->belongsTo(SituationFamilliale::class)->withDefault();
    }

    public function decision_eligibilite_prestataires()
    {
        return $this->hasMany(DecisionEligibilitePrestataire::class);
    }


}
