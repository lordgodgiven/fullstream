<?php

namespace App\Http\Controllers;


use App\Models\DossierBeneficiaire;
use App\Models\ProjetCluster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjetClusterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $dossier_beneficiaire = DossierBeneficiaire::where('compte_utilisateur_id',Auth::user()->id)->get()->first();

        ProjetCluster::create([
            'nom_cluster' => $request->nom_cluster,
            'intitule_projet_cluster' => $request->nom_projet_cluster,
            'objectifs' => $request->objectifs,
            'statut_projet_id' => $request->statut_projet,
            'resume' => $request->resume,
            'defis' => $request->defis,
            'cause_probleme_constate' => $request->causes_probleme_constate,
            'indicateur' => $request->indicateurs,
            'complexite_projet' => $request->complexite_projet,
            'actions_similaires' => $request->complementarite,
            'localisation' => $request->localisation,
            'commune_ville_id' => $request->ville,
            'departement_id' => $request->departement,
            'date_cloture' => $request->date_effective_lancement,
            'date_lancement' => $request->date_effective_cloture,
            'cluster_beneficiaire_id' => $dossier_beneficiaire->id,
            'observation_expert_cluster_responsable_gestionnaire' => $request->observation_expert_gestionnaire,

        ]);
        return redirect()->route('cluster-beneficiaire.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
