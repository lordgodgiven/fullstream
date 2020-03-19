<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{

    protected $guarded = [];
    protected $with = ['chaine_valeur', 'commune_ville', 'departement'];

    public function membre_clusters()
    {
        return $this->hasMany(MembreCluster::class);
    }

    public function action_structures()
    {
        return $this->hasMany(TypeActionStructure::class);
    }

    public function projet_clusters()
    {
        return $this->hasMany(ProjetCluster::class);
    }

    public function chaine_valeur()
    {
        return $this->belongsTo(ChaineValeur::class)->withDefault();
    }

    public function commune_ville()
    {
        return $this->belongsTo(CommuneVille::class)->withDefault();
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class)->withDefault();
    }
}
