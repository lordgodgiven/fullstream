<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EtatDossier extends Model
{
    protected $guarded = [];

    public function eligibilite_prestataires()
    {
        return $this->hasMany(EligibilitePrestataire::class);
    }
}
