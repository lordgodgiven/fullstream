<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentUpload extends Model
{
    protected $guarded = [];


    public function compte_utilisateur()
    {
        return $this->belongsTo(CompteUtilisateur::class);
    }
}
