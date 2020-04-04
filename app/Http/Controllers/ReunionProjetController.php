<?php

namespace App\Http\Controllers;

use App\Models\Cluster;
use App\Models\ProjetCluster;
use App\Models\ReunionProjet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReunionProjetController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $cluster = Cluster::where('compte_utilisateur_id',Auth::user()->id)->get()->first();

        $projetCluster = ProjetCluster::where('cluster_beneficiaire_id',$cluster->dossier_beneficiaire_id)->get()->first();

        ReunionProjet::create([
            'document_upload_id' => 1,
            'projet_cluster_id' =>$projetCluster->id,
            'date' => $request->date_reunion,
            'ordre_jour' => $request->ordre_jour,
            'lieu' => $request->lieu_reunion
        ]);

        return redirect()->route('cluster-beneficiaire.create');
    }
}
