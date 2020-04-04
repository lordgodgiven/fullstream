<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class AssembleeGenerale extends Model
{

    protected $guarded=[];
    protected $dates = ['date'];


    public function getDateAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }
}
