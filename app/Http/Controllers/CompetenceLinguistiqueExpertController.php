<?php

namespace App\Http\Controllers;

use App\Models\CompetenceLinExpert;
use App\Models\DossierPrestataire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompetenceLinguistiqueExpertController extends Controller
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
            'message' => 'Vos competences linguistiques ont été mises avec succès!',
            'alert-type' => 'success'
        );

        $dossier_prestataire = DossierPrestataire::where('compte_utilisateur_id', Auth::user()->id)->first();


        $competenceLinguistiqueExp = new CompetenceLinExpert();
        $competenceLinguistiqueExp->langue_id = $request->langue;
        $competenceLinguistiqueExp->niveau_maitrise_id = $request->niveau_maitrise;
        $competenceLinguistiqueExp->dossier_prestataire_id = $dossier_prestataire->id;

        $competenceLinguistiqueExp->save();

        return redirect()->route('dossier-prestataire.create')->with($notification);

    }
}
