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

        DossierBeneficiaire::where('compte_utilisateur_id', Auth::user()->id)
            ->update([
                'secteur_juridique_id' => $request->secteur_juridique,
                'activite_principale_id' => $request->activite_principale,
                'situation_structure_id' => $request->situation_structure,
                'pays_nationalite_id' => $request->pays,
                'commune_ville_id' => $request->commune_ville,
                'arrondissement_id' => $request->arrondissement,
                'quartier_id' => $request->quartier,
                'code_departement_id' => $request->departement,
                'denomination_raison_sociale' => $request->raison_sociale,
                'sigle_abbreviation' => $request->abreviation,
                'rccm' => $request->rccm,
                'niu' => $request->niu,
                'scien' => $request->scien,
                'sciet' => $request->sciet,
                'autre_identifiant' => $request->autre_identifiant,
                'activite_secondaire' => $request->activite_secondaire,
                'date_creation' => $request->date_creation,
                'nss' => $request->nss,
                'montant_capitale_sociale' => $request->montant_capitale_sociale,
                'chriffre_affaire' => $request->chriffre_affaire,
                'gerant_responsable' => $request->nom_prenom_gerant,
                'presentation_generale' => $request->presentation_generale,
                'nombre_employes' => $request->nombre_employes,
                'structure_mere' => $request->structure_mere,
                'adresse' => $request->adresse,
                'telephone' => $request->telephone,
                'filiale_multinationale' => $request->filiale_multinationale,
                'fax' => $request->fax,
                'telephone' => $request->telephone,
                'site_web' => $request->site_web,
                'reseaux_sociaux' => $request->reseaux_sociaux,
                'motivations' => $request->motivations,
            ]);

        return redirect()->route('dossier-beneficiaire.create')->with($notification);

    }


}
