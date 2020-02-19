<?php

namespace App\Http\Controllers;

use App\Models\DossierBeneficiaire;
use App\Models\DossierPrestataire;

class GestionnaireController extends Controller
{


    public function indexPrestataire()

    {
        $dossierPrestataires = DossierPrestataire::with(['individu'])->get();


        return view('gestionnaire.prestataires.prestataire', compact('dossierPrestataires'));
    }

    public function indexBeneficiaire()
    {
        $dossierBeneficiaires = DossierBeneficiaire::all();
        return view('gestionnaire.beneficiaires.beneficiaire', compact('dossierBeneficiaires'));
    }

    public function showBeneficiaire()
    {
        return view('gestionnaire.beneficiaires.show');
    }

    public function showPrestataire()
    {
        return view('gestionnaire.beneficiaires.show');
    }


}
