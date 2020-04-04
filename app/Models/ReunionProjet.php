<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ReunionProjet extends Model
{

    protected $guarded=[];
    protected $with=['projet_cluster'];
    protected $dates = ['date'];

    public function projet_cluster()
    {
        return $this->belongsTo(ProjetCluster::class)->withDefault();
    }




    public function getDateAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }
}
