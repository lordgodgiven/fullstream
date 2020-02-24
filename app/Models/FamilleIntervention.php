<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FamilleIntervention extends Model
{

    protected $guarded = [];

    public function experience_chaine_valeur_experts()
    {
        return $this->hasMany(ExperienceChaineValeurExpert::class);
    }

    public function type_prestation_dispensees()
    {
        return $this->hasMany(TypePrestationDispensee::class);
    }

    public function offre_prestations()
    {
        return $this->hasMany(OffrePrestation::class);
    }

    public function notation_beneficiaires()
    {
        return $this->hasMany(NotationBeneficiaire::class);
    }

    public function sous_categorie_famille_interventions()
    {
        return $this->hasMany(SousCategorieFamilleIntervention::class);
    }


}
