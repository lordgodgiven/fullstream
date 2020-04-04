<?php

namespace App\Http\Controllers;

use App\Models\Cluster;
use App\Models\RisqueProjet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RisqueProjetController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        RisqueProjet::create([
            'projet_cluster_id' => $request->projet_cluster,
            'niveau_risque_id' => $request->niveau_risque,
            'risque_identifie_mise_œuvre_projet' => $request->risque_identifie,
            'proposition_mitigation' => $request->proposition_mitigation,
        ]);
        return redirect()->route('cluster-beneficiaire.create');
    }
}
