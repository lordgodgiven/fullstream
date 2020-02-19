<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EtapeCircuitValidation extends Model
{

    protected $guarded = [];

    public function circuit_validation()
    {
        return $this->belongsTo(CircuitValidation::class);
    }

    public function decision_circuit_validations()
    {
        return $this->hasMany(DecisionCircuitValidation::class);
    }
}
