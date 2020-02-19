<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SanctionPrestataire extends Model
{
    protected $guarded = [];

    public function dossier_prestataire()
    {
        return $this->belongsTo(DossierPrestataire::class);
    }

    public function type_sanction()
    {
        return $this->belongsTo(TypeSanction::class);
    }

    public function motif()
    {
        return $this->belongsTo(Motif::class);
    }

}
