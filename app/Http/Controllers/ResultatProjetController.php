<?php

namespace App\Http\Controllers;

use App\Models\Cluster;
use App\Models\ProjetCluster;
use App\Models\ResultatProjet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultatProjetController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $cluster = Cluster::where('compte_utilisateur_id', Auth::user()->id)->get()->first();

        $projetCluster = ProjetCluster::where('cluster_beneficiaire_id',$cluster->dossier_beneficiaire_id)->get()->first();

        ResultatProjet::create([
            'projet_cluster_id' => $projetCluster->id,
            'document_upload_id' => 2,
            'code_resultat' => $request->code_resultat,
            'intitule_resultat' => $request->intitule_resultat,
            'statut_resultat_id' => $request->statut_resultat,

        ]);
        return redirect()->route('cluster-beneficiaire.create');
    }
}
