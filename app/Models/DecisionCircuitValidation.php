<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DecisionCircuitValidation extends Model
{

    protected $guarded = [];

    public function etape_circuit_validation()
    {
        return $this->belongsTo(EtapeCircuitValidation::class);
    }
}
