<?php

namespace App\Http\Controllers;

use App\Models\ActivitePrincipale;
use App\Models\Arrondissement;
use App\Models\Cluster;
use App\Models\CommuneVille;
use App\Models\CompteUtilisateur;
use App\Models\DecisionEligibiliteBeneficiaire;
use App\Models\DecisionEligibilitePrestataire;
use App\Models\DegreMaitrise;
use App\Models\DemandePrestation;
use App\Models\Departement;
use App\Models\Devise;
use App\Models\Disponibilite;
use App\Models\DossierBeneficiaire;
use App\Models\DossierPrestataire;
use App\Models\FamilleIntervention;
use App\Models\Individu;
use App\Models\Langue;
use App\Models\PaysNationalite;
use App\Models\Quartier;
use App\Models\SecteurJuridique;
use App\Models\SituationDemande;
use App\Models\SituationStructure;
use App\Models\SousCategorie;
use App\Models\Tdr;
use App\Models\TypeDemande;
use App\Models\TypeEmployeur;
use App\Models\TypeExpert;
use App\Models\TypePrestationDispensee;
use App\Models\ZoneIntervention;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DossierBeneficiaireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $dossierBeneficiaire = DossierBeneficiaire::where('compte_utilisateur_id', Auth::user()->id);
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
        $identifiant_prcce = $this->prcce_identifiant_generator();


        return view('beneficiaire.create', compact('departements',
            'disponibilites', 'listePays', 'zoneInterventions', 'dossierBeneficiaire',
            'nationalites', 'villes', 'email', 'typeExperts', 'utilisateur',
            'familleInterventions', 'sousCategories', 'typeEmployeurs',
            'langues', 'degreMaitrises', 'typePrestationDispensees', 'identifiant_prcce',
            'activitePrincipales', 'secteurJuriques', 'situationStructures', 'arrondissements', 'quartiers'));
    }


    public function prestationCreate()
    {
        $situationDemandes = SituationDemande::all();
        $typePrestations = TypePrestationDispensee::all();
        $familleInterventions = FamilleIntervention::all();
        $typeDemandes = TypeDemande::all();
        $zoneInterventions = ZoneIntervention::all();
        $dossierBeneficiaire = DossierBeneficiaire::where('compte_utilisateur_id', Auth::user()->id)->first();
        $clusters = Cluster::where('dossier_beneficiaire_id', $dossierBeneficiaire->id)->get();

        $demandePrestations = DemandePrestation::where('dossier_beneficiaire_id', $dossierBeneficiaire->id)->get();


        return view('beneficiaire.prestation.create', compact('situationDemandes', 'clusters',
            'typeDemandes', 'familleInterventions', 'typeDemandes', 'typePrestations', 'zoneInterventions', 'demandePrestations'));
    }

    public function prestationStore(Request $request)
    {
        $notification = array(
            'message' => 'Votre demande a été crée avec succès!',
            'alert-type' => 'success'
        );
        $dossierBeneficiaire = DossierBeneficiaire::where('compte_utilisateur_id', Auth::user()->id)->first();
        DemandePrestation::create([
            'dossier_beneficiaire_id' => $dossierBeneficiaire->id,
            'date_creation' => $request->date_creation,
            'date_modification' => $request->date_modification,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'famille_intervention_id' => $request->famille_intervention,
            'sous_categorie_id' => $request->sous_categorie,
            'situation_demande_id' => $request->situation_demande,
            'zone_intervention_id' => $request->zone_intervention,
            'type_demande_id' => $request->type_demande,
            'cluster_id' => $request->cluster,
            'duree_homme_jour' => $request->cluster,
            'motivation' => $request->motivations,
        ]);
        return redirect()->route('dossier-beneficiaire.prestation.create')->with($notification);
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
        $compte_utilisateur_id = CompteUtilisateur::find(Auth::user()->id);
        $dossier_beneficiaire = DossierBeneficiaire::where('compte_utilisateur_id', $compte_utilisateur_id->id)->first();
        Individu::where('id', $dossier_beneficiaire->individu_id)
            ->update([
                'identifiant_prcce' => $request->identifiant_prcce,
                'pays_nationalite_id' => $request->nationalite,
                'niu' => $request->niu,
                'nss' => $request->nss,
                'date_naissance' => $request->date_naissance,
                'situation_familliale_id' => $request->situation_familliale,
                'adresse_personnelle' => $request->adresse,
            ]);

        DossierBeneficiaire::where('compte_utilisateur_id', Auth::user()->id)
            ->update([
                'secteur_juridique_id' => $request->secteur_juridique,
                'activite_principale_id' => $request->activite_principale,
                'situation_structure_id' => $request->situation_structure,
                'pays_nationalite_id' => $request->pays,
                'commune_ville_id' => $request->ville,
                'arrondissement_id' => $request->arrondissement,
                'quartier_id' => $request->quartier,
                'code_departement_id' => $request->departement,
                'denomination_raison_sociale' => $request->raison_sociale,
                'sigle_abbreviation' => $request->abreviation,
                'rccm' => $request->rccm,
                'niu' => $request->niu,
                'scien' => $request->scien,
                'sciet' => $request->sciet,
                'nss' => $request->nss,
                'numero_patente' => $request->numero_patente,
                'identifiant_prcce' => $request->identifiant_prcce,
                'autre_identifiant' => $request->autre_identifiant,
                'activite_secondaire' => $request->activite_secondaire,
                'date_creation' => $request->date_creation,
                'montant_capitale_sociale' => $request->montant_capitale_sociale,
                'chiffre_affaire' => $request->chiffre_affaire,
                'gerant_responsable' => $request->nom_prenom_gerant,
                'presentation_generale' => $request->presentation_generale,
                'nombre_employes' => $request->nombre_employes,
                'structure_mere' => $request->structure_mere,
                'adresse' => $request->adresse,
                'telephone' => $request->telephone,
                'filiale_multinationale' => $request->filiale_multinationale,
                'fax' => $request->fax,
                'site_web' => $request->site_web,
                'reseaux_sociaux' => $request->reseaux_sociaux,
                'motivations' => $request->motivations,
            ]);

        return redirect()->route('dossier-beneficiaire.create')->with($notification);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DossierBeneficiaire $dossierBeneficiaire
     * @return \Illuminate\Http\Response
     */

    public function update($id)
    {
        $notification = array(
            'message' => 'Votre dossier a été soumis avec succès!',
            'alert-type' => 'info'
        );

        DossierBeneficiaire::with('compte_utilisateur')
            ->where('compte_utilisateur_id', $id)
            ->update(['soumission_dossier_ok' => "OUI"]);

        return redirect()->route('profile.show', $id)->with($notification);


    }


    public function createTdr()
    {
        $prestatairesAttenteEligibilite = DossierPrestataire::where('soumission_dossier_ok', 'OUI')->count();
        $prestatairesEligible = DecisionEligibilitePrestataire::where('avis_decision_id', 1)->count();

        $beneficiairesAttenteEligibilite = DossierBeneficiaire::where('soumission_dossier_ok', 'OUI')->count();
        $beneficiairesEligible = DecisionEligibiliteBeneficiaire::where('avis_decision_id', 1)->count();

        $beneficiare = DossierBeneficiaire::where('compte_utilisateur_id', Auth::user()->id)->get()->first();
        $noms = $beneficiare->nom . ' ' . $beneficiare->prenom;
        $demandePrestations = demandePrestation::where('dossier_beneficiaire_id', $beneficiare->id)->get();

        $tdrs = Tdr::where('beneficiaire', $noms)->get();
        $devises = Devise::all();

        return view('beneficiaire.trd.create', compact('prestatairesAttenteEligibilite', 'tdrs',
            'beneficiairesAttenteEligibilite', 'devises', 'prestatairesEligible', 'beneficiairesEligible', 'beneficiare'));
    }

    public function storeTdr(Request $request)
    {

        $notification = array(
            'message' => 'Votre TDR a été crée avec succès!',
            'alert-type' => 'success'
        );
        $dossierBeneficiaire = DossierBeneficiaire::where('compte_utilisateur_id', Auth::user()->id)->get()->first();
        $demandePrestation = DemandePrestation::where('dossier_beneficiaire_id', $dossierBeneficiaire->id)->get()->last();

        $tdr = Tdr::create([
            'reference_tdr' => $request->numero_tdr,
            'titre_mission' => $request->titre_mission,
            'objet_mission' => $request->objet_mission,
            'prestation_demandees' => $request->prestations_demandees,
            'livrable_attendus' => $request->resultats_attendus,
            'montant_depense_accessoires' => $request->depenses_accessoires,
            'composante_sous_composante' => $request->composante_sous_componsante,
            'date_debut_mision' => $request->date_debut,
            'date_fin_mision' => $request->date_fin,
            'duree_mission' => $request->duree_mission,
            'date_demarrage' => $request->date_demarrage,
            'lieu_execution' => $request->lieu_execution,
            'responsable_suivi' => $request->responsable_suivi,
            'date_limite_remise_livrable' => $request->date_limite_remise_livrables,
            'montant_honoraires' => $request->honoraires,
            'beneficiaire' => $request->beneficiare,
            'cluster' => $request->cluster,
            'demande_prestation_id' => $demandePrestation->id,
            'profils_experts_competences_exigees' => $request->profil_expert,
            'date_soumission_tdr' => carbon::now()->format('Y/m/d')
        ]);

        session(['trd_lastId' => $tdr->id]);
        return redirect()->route('dossier-benefiaires.tdr.create')->with($notification);
    }


    /* public function update(DossierBeneficiaire $dossierBeneficiaire)
     {
         dd($dossierBeneficiaire);
         $notification = array(
             'message' => 'Votre dossier a été soumis avec succès!',
             'alert-type' => 'info'
         );

         $dossierBeneficiaire::where('id', $dossierBeneficiaire->id)
             ->update(['soumission_dossier_ok' => "OUI"]);

         return redirect()->route('profile.show', $dossierBeneficiaire->id)->with($notification);
     }*/


    private function prcce_identifiant_generator()
    {
        return $nui = strtoupper("prcce-" . substr(base_convert(sha1(uniqid(mt_rand(), true)), 16, 36), 0, 6));
    }


}
