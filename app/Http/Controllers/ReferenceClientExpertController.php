<?php

namespace App\Http\Controllers;

use App\Models\DossierPrestataire;
use App\Models\ReferenceClientExpert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReferenceClientExpertController extends Controller
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
            'message' => 'Les référénces de vos clients ont été mises à jour avec succès!',
            'alert-type' => 'success'
        );


        $dossier_prestataire = DossierPrestataire::where('compte_utilisateur_id', Auth::user()->id)->first();
        $telephone = $request->indicatif_telephonique . '' . $request->numero_telephone;

        $referenceClientExp = new ReferenceClientExpert();
        $referenceClientExp->nom = $request->nom_prenom_raison_sociale;
        $referenceClientExp->telephone = $request->niveau_maitrise;
        $referenceClientExp->email = $request->email;
        $referenceClientExp->telephone = $telephone;
        $referenceClientExp->type_prestation = $request->type_prestation;
        $referenceClientExp->duree = $request->duree_prestation;
        $referenceClientExp->date_debut = $request->du;
        $referenceClientExp->date_fin = $request->au;
        $referenceClientExp->dossier_prestataire_id = $dossier_prestataire->id;

        $referenceClientExp->save();

        return redirect()->route('dossier-prestataire.create')->with($notification);

    }
}
