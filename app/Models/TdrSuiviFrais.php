<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TdrSuiviFrais extends Model
{

    protected $guarded = [];

    public function tdr()
    {
        return $this->belongsTo(Tdr::class);
    }
}
