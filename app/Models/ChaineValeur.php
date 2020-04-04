<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChaineValeur extends Model
{

    protected $guarded=[];


    public function clusters()
    {
        return $this->hasMany(Cluster::class);
    }
}
