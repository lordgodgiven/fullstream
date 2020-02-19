<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DossierMiseOeuvre extends Model
{

    protected $guarded = [];

    public function rapport_missiosn()
    {
        return $this->hasMany(RapportMission::class);
    }

    public function notation_beneficiaires()
    {
        return $this->hasMany(NotationBeneficiaire::class);
    }

    public function etape_mise_oeuvres()
    {
        return $this->hasMany(EtapeMiseOeuvre::class);
    }

    public function contrat()
    {
        return $this->belongsTo(Contrat::class);
    }
}
