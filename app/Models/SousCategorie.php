<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SousCategorie extends Model
{

    protected $guarded = [];


    public function offre_prestations()
    {
        return $this->hasMany(OffrePrestation::class);
    }

    public function type_prestation_dispensees()
    {
        return $this->hasMany(TypePrestationDispensee::class);
    }

    public function experience_chaine_valeur_experts()
    {
        return $this->hasMany(ExperienceChaineValeurExpert::class);
    }

    public function famille_intervention()
    {
        return $this->belongsTo(FamilleIntervention::class);
    }

}
