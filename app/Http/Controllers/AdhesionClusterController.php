<?php

namespace App\Http\Controllers;

use App\Models\Adhesion;
use App\Models\Cluster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdhesionClusterController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $cluster = Cluster::where('compte_utilisateur_id',Auth::user()->id)->get()->first();
        //dd($cluster);
        Adhesion::create([
            //'membre_beneficiaire_id' => $cluster->id,
            //'responsable_beneficaire_id' => Auth::user()->id,
            'cluster_dossier_beneficiaire_id' =>$cluster->dossier_beneficiaire_id,
            'role_membre_cluster_id' => $request->role_membre_cluster,
            'structure_beneficiaire' => $request->structure_beneficiaire,
            'date_entree' => $request->date_entree,
            'date_sortie' => $request->date_sortie,
            'motif_sortie' => $request->motif_sortie,
            'commentaire' => $request->commentaire_gestionnaire
         ]);
        return redirect()->route('cluster-beneficiaire.create');
    }
}
