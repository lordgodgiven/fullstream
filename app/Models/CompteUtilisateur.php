<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class CompteUtilisateur extends Model
{


    protected $guarded = [];
    protected $with = ['type_compte', 'profil_compte_users', 'document_uploads',
        'civilite', 'genre_sexe', 'dossier_beneficiaires'];

    protected $casts = [
        'non_fonction_publique' => 'boolean',
        'accord_usage_donnees' => 'boolean',
        'accord_reception_info' => 'boolean',
    ];

    public function dossier_beneficiaires()
    {
        return $this->hasMany(DossierBeneficiaire::class);
    }

    public function dossier_prestataires()
    {
        return $this->hasMany(DossierPrestataire::class);
    }

    public function document_uploads()
    {
        return $this->hasMany(DocumentUpload::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function individus()
    {
        return $this->belongsTo(Individu::class)->withDefault();
    }

    public function profil_compte_users()
    {
        return $this->hasMany(ProfilCompteUtilisateur::class);
    }

    public function type_compte()
    {
        return $this->belongsTo(TypeCompte::class)->withDefault();
    }

    public function civilite()
    {
        return $this->belongsTo(Civilite::class)->withDefault();
    }

    public function genre_sexe()
    {
        return $this->belongsTo(GenreSexe::class)->withDefault();
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }

    public function getImageAttribute()
    {
        return $this->profile_image;
    }
}
