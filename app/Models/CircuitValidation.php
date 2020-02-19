<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CircuitValidation extends Model
{

    protected $guarded = [];

    public function etape_circuit_validations()
    {
        return $this->hasMany(EtapeCircuitValidation::class);
    }
}
