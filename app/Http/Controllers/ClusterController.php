<?php

namespace App\Http\Controllers;

use App\Models\ActionStructurationCluster;
use App\Models\ActiviteProjet;
use App\Models\Adhesion;
use App\Models\AssembleeGenerale;
use App\Models\ChaineValeur;
use App\Models\Cluster;
use App\Models\CommuneVille;
use App\Models\DecisionEligibiliteBeneficiaire;
use App\Models\DecisionEligibilitePrestataire;
use App\Models\Departement;
use App\Models\DossierBeneficiaire;
use App\Models\DossierPrestataire;
use App\Models\Motif;
use App\Models\NiveauRisque;
use App\Models\PhaseMiseEnOeuvre;
use App\Models\ProjetCluster;
use App\Models\ResultatProjet;
use App\Models\ReunionProjet;
use App\Models\RisqueProjet;
use App\Models\RoleMembreCluster;
use App\Models\StatutProjet;
use App\Models\StatutResultat;
use App\Models\Tdr;
use App\Models\TypeActionStructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClusterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $prestatairesAttenteEligibilite = DossierPrestataire::where('soumission_dossier_ok', 'OUI')->count();
        $prestatairesEligible = DecisionEligibilitePrestataire::where('avis_decision_id', 1)->count();

        $beneficiairesAttenteEligibilite = DossierBeneficiaire::where('soumission_dossier_ok', 'OUI')->count();
        $beneficiairesEligible = DecisionEligibiliteBeneficiaire::where('avis_decision_id', 1)->count();
        $clusters = Cluster::where('compte_utilisateur_id', Auth::user()->id)->get();

        return view('beneficiaire.cluster.index', compact('beneficiairesEligible', 'prestatairesEligible',
            'prestatairesAttenteEligibilite', 'beneficiairesAttenteEligibilite', 'clusters'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexStructuration()
    {

        $prestatairesAttenteEligibilite = DossierPrestataire::where('soumission_dossier_ok', 'OUI')->count();
        $prestatairesEligible = DecisionEligibilitePrestataire::where('avis_decision_id', 1)->count();

        $beneficiairesAttenteEligibilite = DossierBeneficiaire::where('soumission_dossier_ok', 'OUI')->count();
        $beneficiairesEligible = DecisionEligibiliteBeneficiaire::where('avis_decision_id', 1)->count();
        $actionStructurations = ActionStructurationCluster::all();

        return view('beneficiaire.cluster.structuration.index', compact('beneficiairesEligible', 'prestatairesEligible',
            'prestatairesAttenteEligibilite', 'beneficiairesAttenteEligibilite', 'actionStructurations'));
    }

    public function createStructuration()
    {
        $prestatairesAttenteEligibilite = DossierPrestataire::where('soumission_dossier_ok', 'OUI')->count();
        $prestatairesEligible = DecisionEligibilitePrestataire::where('avis_decision_id', 1)->count();

        $beneficiairesAttenteEligibilite = DossierBeneficiaire::where('soumission_dossier_ok', 'OUI')->count();
        $beneficiairesEligible = DecisionEligibiliteBeneficiaire::where('avis_decision_id', 1)->count();

        $tdrs = Tdr::all();
        $clusters = Cluster::all();
        $phases = PhaseMiseEnOeuvre::all();
        $typeActions = TypeActionStructure::all();
        return view('beneficiaire.cluster.structuration.create', compact('beneficiairesEligible', 'prestatairesEligible',
            'prestatairesAttenteEligibilite', 'beneficiairesAttenteEligibilite', 'tdrs', 'clusters', 'phases', 'typeActions'));
    }

    public function storeStructuration(Request $request)
    {

        ActionStructurationCluster::create([
            'cluster_id' => $request->cluster,
            'phase_mise_en_oeuvre_id' => $request->phase,
            'type_action_structure_id' => $request->type_action_structuration,
            'ref_tdr_id' => $request->numero_tdr,
            'date_debut_prevue' => $request->date_debut_previsionnelle,
            'date_fin_prevue' => $request->date_fin_previsionnelle,
            'duree_homme_jour_prevue' => $request->duree_expertise_prevue,
            'duree_homme_jour_realisee' => $request->duree_expertise_realisee,
            'etape' => $request->etape,
            'activite' => $request->activite,
            'date_debut_effective' => $request->date_debut_effective,
            'date_fin_effective' => $request->date_fin_effective,
            'lieu_execution' => $request->lieu_execution,
            'taux_progression' => $request->taux_realisation,
            'nombre_participant' => $request->nombre_participant,
            'observation' => $request->commentaire_gestionnaire,
        ]);
        return redirect()->route('cluster-beneficiaire.structuration.index');
    }

    public function create()
    {
        $prestatairesAttenteEligibilite = DossierPrestataire::where('soumission_dossier_ok', 'OUI')->count();
        $prestatairesEligible = DecisionEligibilitePrestataire::where('avis_decision_id', 1)->count();

        $beneficiairesAttenteEligibilite = DossierBeneficiaire::where('soumission_dossier_ok', 'OUI')->count();
        $beneficiairesEligible = DecisionEligibiliteBeneficiaire::where('avis_decision_id', 1)->count();

        $dossierBeneficiaire = DossierBeneficiaire::where('compte_utilisateur_id', Auth::user()->id)->get()->first();
        $structureBeneficiaires = DossierBeneficiaire::all();
        $roleMembreClusters = RoleMembreCluster::all();
        $motifs = Motif::all();
        $departements = Departement::all();
        $chaineValeurs = ChaineValeur::all();
        $clusters = Cluster::all();
        $statutProjets = StatutProjet::all();
        $statutResultats = StatutResultat::all();
        $villes = CommuneVille::all();
        $assembleeGenerales = AssembleeGenerale::all();
        $niveauRisques = NiveauRisque::all();
        $clusterBeneficiaire = Cluster::where('compte_utilisateur_id', Auth::user()->id)->get()->first();

        $risqueProjets = RisqueProjet::leftJoin('projet_clusters', 'risque_projets.projet_cluster_id', '=', 'projet_clusters.id')
            ->leftJoin('niveau_risques', 'risque_projets.niveau_risque_id', '=', 'niveau_risques.id')
            ->leftJoin('clusters', 'projet_clusters.cluster_beneficiaire_id', '=', 'clusters.dossier_beneficiaire_id')
            ->select('risque_projets.id', 'risque_projets.proposition_mitigation', 'risque_projets.risque_identifie_mise_œuvre_projet',
                'niveau_risques.designation')
            ->where('clusters.compte_utilisateur_id', Auth::user()->id)
            ->get();

        $membreClusters = Adhesion::leftJoin('clusters', 'adhesions.cluster_dossier_beneficiaire_id', '=', 'clusters.dossier_beneficiaire_id')
            ->leftJoin('dossier_beneficiaires', 'adhesions.structure_beneficiaire', '=', 'dossier_beneficiaires.id')
            ->leftJoin('role_membre_clusters', 'adhesions.role_membre_cluster_id', '=', 'role_membre_clusters.id')
            ->leftJoin('chaine_valeurs', 'clusters.chaine_valeur_id', '=', 'chaine_valeurs.id')
            ->select('role_membre_clusters.designation as role', 'adhesions.date_entree', 'clusters.nom_cluster',
                'dossier_beneficiaires.denomination_raison_sociale as structure_membre',
                'chaine_valeurs.designation as chaine_valeur', 'adhesions.id')
            ->get();

        $projetClusters = ProjetCluster::where('cluster_beneficiaire_id', $dossierBeneficiaire->id)->get();

        $projetCluster = ProjetCluster::where('cluster_beneficiaire_id', optional($clusterBeneficiaire)->dossier_beneficiaire_id ?? 0)->get()->first();


        $reunionProjets = ReunionProjet::where('projet_cluster_id', optional($projetCluster)->id ?? 0)->get();
        $resultatProjets = ResultatProjet::where('projet_cluster_id', optional($projetCluster)->id ?? 0)->get();
        $activiteProjets = ActiviteProjet::leftJoin('resultat_projets', 'activite_projets.resultat_projet_id', '=', 'resultat_projets.id')
            ->leftJoin('projet_clusters', 'resultat_projets.projet_cluster_id', '=', 'projet_clusters.id')
            ->leftJoin('statut_resultats', 'resultat_projets.statut_resultat_id', '=', 'statut_resultats.id')
            ->where('cluster_beneficiaire_id', optional($clusterBeneficiaire)->dossier_beneficiaire_id ?? 0)
            ->get();


        return view('beneficiaire.cluster.create', compact('dossierBeneficiaire', 'clusters', 'projetClusters',
            'villes', 'departements', 'beneficiairesEligible', 'prestatairesEligible', 'chaineValeurs', 'assembleeGenerales', 'membreClusters',
            'prestatairesAttenteEligibilite', 'motifs', 'niveauRisques', 'risqueProjets',
            'villes', 'statutResultats', 'resultatProjets', 'activiteProjets', 'structureBeneficiaires',
            'beneficiairesAttenteEligibilite', 'clusterBeneficiaire', 'statutProjets', 'reunionProjets', 'roleMembreClusters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $notification = array(
            'message' => 'Cluster a été crée avec succès!',
            'alert-type' => 'success'
        );
        $dossier_beneficiaire = DossierBeneficiaire::where('compte_utilisateur_id', Auth::user()->id)->get()->first();
        Cluster::create([
            'dossier_beneficiaire_id' => $dossier_beneficiaire->id,
            'compte_utilisateur_id' => Auth::user()->id,
            'chaine_valeur_id' => $request->chaine_valeur,
            'president_inidividu_id' => $dossier_beneficiaire->individu_id,
            'secretaire_individu_id' => $request->secretaire_id,
            'commune_ville_id' => $request->ville,
            'departement_id' => $request->departement,
            'identificiant_prcce' => $request->identifiant_prcce,
            'numero_enregistrement' => $request->numero_enregistrement,
            'nom_cluster' => $request->nom_cluster,
            'structure_responsable' => $request->structure_responsable_cluster,
            'date_creation' => $request->date_creation,
            'auteur' => $request->auteur_cluster,
        ]);

        return redirect()->route('cluster-beneficiaire.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        //
    }
}
