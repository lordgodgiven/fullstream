<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeActionStructure extends Model
{
    protected $guarded = [];

    public function cluster()
    {
        return $this->belongsTo(Cluster::class);
    }
}
