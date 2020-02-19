<?php

namespace App\Http\Controllers;

use App\Models\DossierPrestataire;
use App\Models\TypePrestationDispensee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypePrestationDispenseeController extends Controller
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
            'message' => 'Vos préstations ont été ajoutées avec succès!',
            'alert-type' => 'success'
        );

        $dossier_prestataire = DossierPrestataire::where('compte_utilisateur_id', Auth::user()->id)->first();

        $typePrestationDispensee = new TypePrestationDispensee();
        $typePrestationDispensee->famille_intervention_id = $request->famille_intervention;
        $typePrestationDispensee->sous_categorie_id = $request->sous_categorie;
        $typePrestationDispensee->dossier_prestataire_id = $dossier_prestataire->id;

        $typePrestationDispensee->save();

        return redirect()->route('dossier-prestataire.create')->with($notification);

    }
}
