<?php

namespace App\Http\Controllers;

use App\Models\DossierPrestataire;
use App\Models\ExperienceChaineValeurExpert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExperienceChaineValeurExpertController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $notification = array(
            'message' => 'Votre expérience a été mise à jour avec succès!',
            'alert-type' => 'success'
        );

        $dossier_prestataire = DossierPrestataire::where('compte_utilisateur_id', Auth::user()->id)->first();


        $experienceChaineValeurExp = new ExperienceChaineValeurExpert();
        $experienceChaineValeurExp->famille_intervention_id = $request->famille_intervention;
        $experienceChaineValeurExp->sous_categorie_id = $request->sous_categorie;
        $experienceChaineValeurExp->annees_experience = $request->annees_experience;
        $experienceChaineValeurExp->dossier_prestataire_id = $dossier_prestataire->id;

        $experienceChaineValeurExp->save();

        return redirect()->route('dossier-prestataire.create')->with($notification);

    }
}
