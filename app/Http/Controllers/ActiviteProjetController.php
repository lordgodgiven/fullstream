<?php

namespace App\Http\Controllers;

use App\Models\ActiviteProjet;
use App\Models\Cluster;
use App\Models\ProjetCluster;
use App\Models\ResultatProjet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActiviteProjetController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $cluster = Cluster::where('compte_utilisateur_id',Auth::user()->id)->get()->first();

        $projetCluster = ProjetCluster::where('cluster_beneficiaire_id',$cluster->dossier_beneficiaire_id)->get()->first();
        $resultatProjet = ResultatProjet::where('projet_cluster_id',$projetCluster->id)->get()->first();

        ActiviteProjet::create([
            'resultat_projet_id' => $request->resultat,
            'document_upload_id' => 2,
            'code_activite' => $request->code_activite,
            'intitule_activite' => $request->intitule_activite,
            'livrables' => $request->livrables,
            'date_previsionnelle_demarrage' => $request->date_privisonnelle_demarrage,
            'date_effective_demarrage' => $request->date_reelle_demarrage,
            'duree_homme_jour' => $request->duree_homme_jour,
            'perdiem' => $request->perdiem,
            'delais_mise_oeuvre' => $request->delais_mise_oeuvre,
            'responsable' => $request->responsable,
            'besoins_mise_œuvre' => $request->besoins_mise_oeuvre,
            'observations_besoins' => $request->observation_besoins,
            'commentaire_eventuel' => $request->commentaire_eventuel,
        ]);
        return redirect()->route('cluster-beneficiaire.create');
    }
}
