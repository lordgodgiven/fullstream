<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Individu extends Model
{
    protected $guarded = [];
    protected $dates = ['date_naissance'];
    protected $with = ['niveau_qualification'];

    public function dossier_prestataires()
    {
        return $this->hasMany(DossierPrestataire::class);
    }

    public function pays_nationalite()
    {
        return $this->belongsTo(PaysNationalite::class)->withDefault();
    }

    public function civilite()
    {
        return $this->belongsTo(Civilite::class)->withDefault();
    }

    public function genre_sexe()
    {
        return $this->belongsTo(GenreSexe::class)->withDefault();
    }

    public function compte_utilisateurs()
    {
        return $this->hasMany(CompteUtilisateur::class);
    }

    public function niveau_qualification()
    {
        return $this->belongsTo(NiveauQualification::class);
    }

//    public function setDateNaissanceAttribute($value)
//    {
//        return $this->attributes['date_naissance'] = Carbon::createFromFormat('d/m/Y',$value)->format('Y-m-d');
//    }

    public function getDateNaissanceAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
}
