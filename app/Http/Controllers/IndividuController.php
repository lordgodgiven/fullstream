<?php

namespace App\Http\Controllers;

use App\Models\DossierPrestataire;
use App\Models\Individu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndividuController extends Controller
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
            'message' => 'Vos informations individuelle a été mises à jour avec succès!',
            'alert-type' => 'success'
        );

        $individu = new Individu();
        $individu->identifiant_prcceii = $request->identifiant_prcceii;
        $individu->genre_sexe_id = $request->sexe;
        $individu->pays_nationalite_id = $request->nationalite;
        $individu->niveau_qualification_id = $request->niveau_qualification;
        $individu->civilite_id = $request->civilite;
        $individu->situation_familliale_id = $request->situation_familliale;
        $individu->niu = $request->niu;
        $individu->nss = $request->nss;
        $individu->nom = $request->nom;
        $individu->prenom = $request->prenom;
        $individu->date_naissance = $request->date_naissance;
        $individu->photo = $request->photo;
        $individu->compte_utilisateur_id = Auth::user()->id;
        $individu->save();
        $individu_id = $individu;

        $dossier_prestataire = DossierPrestataire::where('compte_utilisateur_id', Auth::user()->id)->first();

        $dossier_prestataire->save(['individu_id' => $individu_id->id]);


        return redirect()->route('dossier-prestataire.create')->with($notification);

    }
}
