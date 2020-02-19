<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disponibilite extends Model
{

    protected $guarded = [];

    public function dossier_prestatairse()
    {
        return $this->hasMany(DossierPrestataire::class);
    }
}
