<?php

namespace App\Http\Controllers;

use App\Models\Civilite;
use App\Models\GenreSexe;
use App\Models\ProfilUtilisateur;
use App\Models\TypeCompte;

class welcomeController extends Controller
{

    public function home()
    {

        $profil_utilisateurs = ProfilUtilisateur::all();
        $type_comptes = TypeCompte::all();
        $sexes = GenreSexe::all();
        $civilites = Civilite::all();

        return view('welcome', compact('sexes', 'profil_utilisateurs', 'type_comptes', 'civilites'));
    }
}
