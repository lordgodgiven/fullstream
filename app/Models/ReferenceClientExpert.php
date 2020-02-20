<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ReferenceClientExpert extends Model
{
    protected $guarded = [];
    protected $dates = ['date_debut', 'date_fin'];

    public function dossier_prestataire()
    {
        return $this->belongsTo(DossierPrestataire::class);
    }

    public function getDateDebutAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function getDateFinAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
}
