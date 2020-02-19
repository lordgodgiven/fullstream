<?php

namespace App\Http\Controllers;

use App\Models\DossierPrestataire;
use App\Models\Employeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeurController extends Controller
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
            'message' => 'Les informations de votre employeur ont été mises à jour avec succès!',
            'alert-type' => 'success'
        );

        $dossier_prestataire = DossierPrestataire::where('compte_utilisateur_id', Auth::user()->id)->first();

        $employeur = new Employeur();
        $employeur->dossier_prestataire_id = $dossier_prestataire->id;
        $employeur->pays_nationalite_id = $request->pays;
        $employeur->type_employeur_id = $request->type_employeur;
        $employeur->anciennete = $request->annees_anciennete;
        $employeur->missions_principales = $request->missions_principales;
        $employeur->nom = $request->nom_employeur;

        $employeur->save();

        return redirect()->route('dossier-prestataire.create')->with($notification);

    }
}
