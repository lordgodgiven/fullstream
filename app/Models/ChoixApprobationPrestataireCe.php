<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChoixApprobationPrestataireCe extends Model
{

    protected $guarded = [];

    public function tdr()
    {
        return $this->belongsTo(Tdr::class);
    }
}
