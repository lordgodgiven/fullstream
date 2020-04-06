<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ActionStructurationCluster extends Model
{

    protected $guarded = [];
    protected $with = ['phase_mise_en_oeuvre', 'type_action_structure', 'tdr'];
    protected $dates = ['date_debut_prevue', 'date_fin_prevue', 'date_debut_effective', 'date_fin_effective'];

    public function cluster()
    {
        return $this->belongsTo(Cluster::class)->withDefault();
    }

    public function phase_mise_en_oeuvre()
    {
        return $this->belongsTo(PhaseMiseEnOeuvre::class)->withDefault();
    }

    public function type_action_structure()
    {
        return $this->belongsTo(TypeActionStructure::class)->withDefault();
    }

    public function tdr()
    {
        return $this->belongsTo(Tdr::class)->withDefault();
    }


    public function getDateDebutPrevueAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }

    public function getDateDebutEffectiveAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }

    public function getDateFinPrevueAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }

    public function getDateFinEffectiveAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }


}
