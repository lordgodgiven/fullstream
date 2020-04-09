<?php

namespace App\Http\Controllers;

use App\Models\Civilite;
use App\Models\CommuneVille;
use App\Models\CompteUtilisateur;
use App\Models\DecisionEligibiliteBeneficiaire;
use App\Models\DecisionEligibilitePrestataire;
use App\Models\DossierBeneficiaire;
use App\Models\DossierPrestataire;
use App\Models\Droit;
use App\Models\Fonctionnalite;
use App\Models\GenreSexe;
use App\Models\Individu;
use App\Models\Module;
use App\Models\Permission;
use App\Models\ProfilCompteUtilisateur;
use App\Models\ProfilUtilisateur;
use App\Models\TypeCompte;
use Illuminate\Http\Request;

class AdministrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestatairesAttenteEligibilite = DossierPrestataire::where('soumission_dossier_ok', 'OUI')->count();
        $prestatairesEligible = DecisionEligibilitePrestataire::where('avis_decision_id', 1)->count();

        $beneficiairesAttenteEligibilite = DossierBeneficiaire::where('soumission_dossier_ok', 'OUI')->count();
        $beneficiairesEligible = DecisionEligibiliteBeneficiaire::where('avis_decision_id', 1)->count();

        return view('administration.index', compact('prestatairesAttenteEligibilite', 'beneficiairesAttenteEligibilite', 'prestatairesEligible', 'beneficiairesEligible'));
    }

    public function indexUtilisateur()
    {

        $prestatairesAttenteEligibilite = DossierPrestataire::where('soumission_dossier_ok', 'OUI')->count();
        $prestatairesEligible = DecisionEligibilitePrestataire::where('avis_decision_id', 1)->count();

        $beneficiairesAttenteEligibilite = DossierBeneficiaire::where('soumission_dossier_ok', 'OUI')->count();
        $beneficiairesEligible = DecisionEligibiliteBeneficiaire::where('avis_decision_id', 1)->count();
        $utilisateurs = CompteUtilisateur::all();


        return view('administration.utilisateurs.index', compact('utilisateurs',
            'prestatairesAttenteEligibilite', 'beneficiairesAttenteEligibilite', 'prestatairesEligible', 'beneficiairesEligible'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $prestatairesAttenteEligibilite = DossierPrestataire::where('soumission_dossier_ok', 'OUI')->count();
        $prestatairesEligible = DecisionEligibilitePrestataire::where('avis_decision_id', 1)->count();

        $beneficiairesAttenteEligibilite = DossierBeneficiaire::where('soumission_dossier_ok', 'OUI')->count();
        $beneficiairesEligible = DecisionEligibiliteBeneficiaire::where('avis_decision_id', 1)->count();

        $sexes = GenreSexe::all();
        $civilites = Civilite::all();
        $typeComptes = TypeCompte::all();
        $profilCompteUtilisateurs = ProfilCompteUtilisateur::all();
        $profilUtilisateurs = ProfilUtilisateur::all();
        $droits = Droit::all();
        $fonctionnalites = Fonctionnalite::all();
        $modules = Module::all();

        return view('administration.utilisateurs.create', compact('sexes', 'prestatairesAttenteEligibilite',
            'civilites', 'typeComptes', 'profilCompteUtilisateurs', 'prestatairesEligible', 'beneficiairesAttenteEligibilite',
            'profilUtilisateurs', 'droits', 'modules', 'fonctionnalites', 'beneficiairesAttenteEligibilite', 'beneficiairesEligible'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request->all());
        $notification = array(
            'message' => 'Utilisateur créer avec succès!',
            'alert-type' => 'success'
        );


        $compteUtilisateur = new CompteUtilisateur();
        $compteUtilisateur->type_compte_id = $request->type_compte;
        $compteUtilisateur->civilite_id = $request->civilite;
        $compteUtilisateur->genre_sexe_id = $request->sexe;
        $compteUtilisateur->nom = $request->nom;
        $compteUtilisateur->prenom = $request->prenom;
        $compteUtilisateur->login = $request->identifiant;
        $compteUtilisateur->password = bcrypt($request->mot_passe);
        $compteUtilisateur->email = $request->email;
        $compteUtilisateur->save();

        $compteUtilisateurId = $compteUtilisateur->id;

        $itemArray = $request->fonctionnalite;
        $count = count($itemArray);
        for ($i = 0; $i < $count; $i++) {

            $permission = new Permission();
            $permission->profil_compte_utilisateur_id = $request->profil_compte_utilisateur;
            $permission->compte_utilisateur_id = $compteUtilisateurId;
            $permission->droit_id = $request->droit;
            $permission->profil_utilisateur_id = $request->profil_utilisateur;
            $permission->fonctionnalite_id = $itemArray[$i];
            $permission->module_id = $request->module;
            $permission->save();
        }


//        $droitHabilitation = new DroitHabilitation();
//        $droitHabilitation->profil_utilisateur_id = $request->profil_utilisateur;
//        $droitHabilitation->droit_id = $request->droit;
//        $droitHabilitation->fonctionnalite_id = $request->droit;
//
//        DroitHabilitation::create(['profil_utilisateur_id' => $request->profil_utilisateur,
//                                    'droit_id'=>$request->droit,'fonctionnalite_id' => $items]);


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(CompteUtilisateur $utilisateur)
    {
        $prestatairesAttenteEligibilite = DossierPrestataire::where('soumission_dossier_ok', 'OUI')->count();
        $prestatairesEligible = DecisionEligibilitePrestataire::where('avis_decision_id', 1)->count();

        $beneficiairesAttenteEligibilite = DossierBeneficiaire::where('soumission_dossier_ok', 'OUI')->count();
        $beneficiairesEligible = DecisionEligibiliteBeneficiaire::where('avis_decision_id', 1)->count();

        $infoComplementaires = Individu::where('compte_utilisateur_id', $utilisateur->id)->first();
        //dd($infoComplementaires);
        $typeCompte = CompteUtilisateur::with(['type_compte', 'profil_compte_users'])->first();

        $profileUtilisateur = ProfilCompteUtilisateur::with('profil_utilisateur')->where('profil_utilisateur_id', $typeCompte);

        $dossierPrestataire = DossierPrestataire::where('individu_id', $infoComplementaires->id)->first();

        $communeVille = CommuneVille::where('pays_nationalite_id', $infoComplementaires->pays_nationalite_id)->first();

        return view('administration.utilisateurs.show', compact('utilisateur', 'prestatairesAttenteEligibilite', 'beneficiairesAttenteEligibilite',
            'communeVille', 'infoComplementaires', 'typeCompte', 'prestatairesEligible', 'beneficiairesEligible'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CompteUtilisateur $utilisateur
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(CompteUtilisateur $utilisateur)
    {


        $sexes = GenreSexe::all();
        $civilites = Civilite::all();
        $typeComptes = TypeCompte::all();
        $profilCompteUtilisateurs = ProfilCompteUtilisateur::all();
        $profilUtilisateurs = ProfilUtilisateur::all();
        $droitss = Droit::all();
        $fonctionnalites = Fonctionnalite::all();
        $modules = Module::all();

        return view('administration.utilisateurs.edit', compact('sexes',
            'civilites', 'typeComptes', 'profilCompteUtilisateurs',
            'profilUtilisateurs', 'droitss', 'modules', 'fonctionnalites', 'utilisateur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
