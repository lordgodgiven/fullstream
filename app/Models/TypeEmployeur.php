<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeEmployeur extends Model
{
    protected $guarded = [];

    public function employeurs()
    {
        return $this->hasMany(Employeur::class);
    }
}
