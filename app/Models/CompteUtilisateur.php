<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CompteUtilisateur extends Model
{


    protected $guarded = [];
    protected $with = ['type_compte', 'profil_compte_users',
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
        return $this->belongsTo(Individu::class);
    }

    public function profil_compte_users()
    {
        return $this->hasMany(ProfilCompteUtilisateur::class);
    }

    public function type_compte()
    {
        return $this->belongsTo(TypeCompte::class);
    }

    public function civilite()
    {
        return $this->belongsTo(Civilite::class);
    }

    public function genre_sexe()
    {
        return $this->belongsTo(GenreSexe::class);
    }
}
