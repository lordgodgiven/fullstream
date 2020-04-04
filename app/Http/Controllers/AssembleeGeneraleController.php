<?php

namespace App\Http\Controllers;

use App\Models\AssembleeGenerale;
use App\Models\Cluster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssembleeGeneraleController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $cluster = Cluster::where('compte_utilisateur_id',Auth::user()->id)->get()->first();

        AssembleeGenerale::create(
            [
                'cluster_beneficiaire_id'=>$cluster->dossier_beneficiaire_id,
                'date'=>$request->date,
                'lieu'=>$request->lieu,
            ]);
        return redirect()->route('cluster-beneficiaire.create');
    }
}
