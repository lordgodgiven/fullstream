<?php

namespace App\Http\Controllers;

use App\Models\ActivitePrincipale;
use App\Models\Arrondissement;
use App\Models\CommuneVille;
use App\Models\CompteUtilisateur;
use App\Models\DegreMaitrise;
use App\Models\Departement;
use App\Models\Disponibilite;
use App\Models\DossierBeneficiaire;
use App\Models\FamilleIntervention;
use App\Models\Langue;
use App\Models\PaysNationalite;
use App\Models\Quartier;
use App\Models\SecteurJuridique;
use App\Models\SituationStructure;
use App\Models\SousCategorie;
use App\Models\TypeEmployeur;
use App\Models\TypeExpert;
use App\Models\TypePrestationDispensee;
use App\Models\ZoneIntervention;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DossierBeneficiaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('beneficiaire.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $utilisateur = CompteUtilisateur::find(Auth::user()->id);
        $nationalites = PaysNationalite::all();
        $listePays = PaysNationalite::all();
        $departements = Departement::all();
        $disponibilites = Disponibilite::all();
        $zoneInterventions = ZoneIntervention::all();
        $villes = CommuneVille::all();
        $email = CompteUtilisateur::find(Auth::user()->id);
        $typeExperts = TypeExpert::all();
        $familleInterventions = FamilleIntervention::with('sous_categorie_famille_interventions')->get();
        $sousCategories = SousCategorie::all();
        $typeEmployeurs = TypeEmployeur::all();
        $langues = Langue::all();
        $degreMaitrises = DegreMaitrise::all();
        $typePrestationDispensees = TypePrestationDispensee::all();
        $secteurJuriques = SecteurJuridique::all();
        $activitePrincipales = ActivitePrincipale::all();
        $situationStructures = SituationStructure::all();
        $arrondissements = Arrondissement::all();
        $quartiers = Quartier::all();


        return view('beneficiaire.create', compact('departements',
            'disponibilites', 'listePays', 'zoneInterventions',
            'nationalites', 'villes', 'email', 'typeExperts', 'utilisateur',
            'familleInterventions', 'sousCategories', 'typeEmployeurs',
            'langues', 'degreMaitrises', 'typePrestationDispensees',
            'activitePrincipales', 'secteurJuriques', 'situationStructures', 'arrondissements', 'quartiers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $notification = array(
            'message' => 'Bénéficiaire votre dossier a été crée avec succès!',
            'alert-type' => 'success'
        );

        $dossierBeneficiaire = new DossierBeneficiaire();
        $dossierBeneficiaire->compte_utilisateur_id = Auth::user()->id;
        $dossierBeneficiaire->secteur_juridique_id = $request->secteur_juridique;
        $dossierBeneficiaire->activite_principale_id = $request->activite_principale;
        $dossierBeneficiaire->situation_structure_id = $request->situation_structure;
        $dossierBeneficiaire->pays_nationalite_id = $request->pays;
        $dossierBeneficiaire->commune_ville_id = $request->ville;
        $dossierBeneficiaire->arrondissement_id = $request->arrondissement;
        $dossierBeneficiaire->quartier_id = $request->quartier;
        $dossierBeneficiaire->naema = $request->naema;
        $dossierBeneficiaire->code_departement_id = $request->departement;
        $dossierBeneficiaire->nopma = $request->nopema;
        $dossierBeneficiaire->denomination_raison_sociale = $request->raison_sociale;
        $dossierBeneficiaire->nom = $request->nom;
        $dossierBeneficiaire->prenom = $request->prenom;
        $dossierBeneficiaire->sigle_abbreviation = $request->abreviation;
        $dossierBeneficiaire->rccm = $request->rccm;
        $dossierBeneficiaire->niu = $request->niu;
        $dossierBeneficiaire->scien = $request->scien;
        $dossierBeneficiaire->sciet = $request->sciet;
        $dossierBeneficiaire->nss = $request->nss;
        $dossierBeneficiaire->autre_identifiant = $request->autre_identifiant;
        $dossierBeneficiaire->activite_secondaire = $request->activite_secondaire;
        $dossierBeneficiaire->date_creation = $request->date_creation;
        $dossierBeneficiaire->capitale_sociale = $request->montant_capitale;
        $dossierBeneficiaire->gerant_responsable = $request->nom_prenom_gerant;
        $dossierBeneficiaire->presentation_generale = $request->presentation_generale;
        $dossierBeneficiaire->nombre_employes = $request->nombre_employes;
        $dossierBeneficiaire->structure_mere = $request->structure_mere;
        $dossierBeneficiaire->adresse = $request->adresse;
        $dossierBeneficiaire->telephone = $request->numero_telephone;
        $dossierBeneficiaire->filiale_multinationale = $request->filiale_multinationale;
        $dossierBeneficiaire->fax = $request->fax;
        $dossierBeneficiaire->email = $request->email;
        $dossierBeneficiaire->site_web = $request->site_web;
        $dossierBeneficiaire->reseaux_sociaux = $request->reseaux_sociaux;
        $dossierBeneficiaire->motivations = $request->motivations;

        // $dossierBeneficiaire->save();

        return redirect()->route('dossier-beneficiaire.create')->with($notification);

    }


}
