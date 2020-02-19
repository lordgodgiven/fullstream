<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fonctionnalite extends Model
{

    protected $guarded = [];


    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
