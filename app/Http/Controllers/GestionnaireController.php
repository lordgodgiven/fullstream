<?php

namespace App\Http\Controllers;

use App\Models\Accreditation;
use App\Models\AccreditationNiveau1;
use App\Models\AccreditationNiveau2;
use App\Models\Adhesion;
use App\Models\Appreciation;
use App\Models\AvisDecision;
use App\Models\ChaineValeur;
use App\Models\Cluster;
use App\Models\CommuneVille;
use App\Models\CompetenceLinExpert;
use App\Models\DecisionEligibiliteBeneficiaire;
use App\Models\DecisionEligibilitePrestataire;
use App\Models\DemandePrestation;
use App\Models\Departement;
use App\Models\Devise;
use App\Models\Disponibilite;
use App\Models\DocumentUpload;
use App\Models\DomaineCertTechnique;
use App\Models\DossierBeneficiaire;
use App\Models\DossierPrestataire;
use App\Models\EligibiliteBeneficiaire;
use App\Models\EligibilitePrestataire;
use App\Models\Employeur;
use App\Models\EpreuveAccreditation;
use App\Models\ExperienceChaineValeurExpert;
use App\Models\FamilleIntervention;
use App\Models\Mention;
use App\Models\NiveauAccreditation;
use App\Models\NiveauMaitrise;
use App\Models\PaysNationalite;
use App\Models\ReferenceClientExpert;
use App\Models\RoleMembreCluster;
use App\Models\Tdr;
use App\Models\TransitionAccreditation;
use App\Models\TypePrestationDispensee;
use App\Models\Versement;
use App\Models\VisaDecision;
use App\Models\ZoneIntervention;
use Illuminate\Http\Request;

class GestionnaireController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $prestatairesAttenteEligibilite = DossierPrestataire::where('soumission_dossier_ok', 'OUI')->count();
        $prestatairesEligible = DecisionEligibilitePrestataire::where('avis_decision_id', 1)->count();

        $beneficiairesAttenteEligibilite = DossierBeneficiaire::where('soumission_dossier_ok', 'OUI')->count();
        $beneficiairesEligible = DecisionEligibiliteBeneficiaire::where('avis_decision_id', 1)->count();

        return view('gestionnaire.index', compact(
            'beneficiairesAttenteEligibilite', 'beneficiairesEligible', 'prestatairesEligible',
            'prestatairesAttenteEligibilite'));
    }


    public function indexAccreditationNiveau1()
    {
        $prestatairesAttenteEligibilite = DossierPrestataire::where('soumission_dossier_ok', 'OUI')->count();
        $prestatairesEligible = DecisionEligibilitePrestataire::where('avis_decision_id', 1)->count();
        $dossierPrestataires = DecisionEligibilitePrestataire::where('avis_decision_id', 1)->get();

        $beneficiairesAttenteEligibilite = DossierBeneficiaire::where('soumission_dossier_ok', 'OUI')->count();
        $beneficiairesEligible = DecisionEligibiliteBeneficiaire::where('avis_decision_id', 1)->count();


        $dossierPrestataires = DecisionEligibilitePrestataire::where('avis_decision_id', 1)->latest()->get();

        return view('gestionnaire.prestataires.accreditation_level_one', compact(
            'beneficiairesAttenteEligibilite', 'prestatairesEligible', 'beneficiairesEligible',
            'prestatairesAttenteEligibilite', 'dossierPrestataires'));
    }


    public function indexAccreditationNiveau2()
    {
        $prestatairesAttenteEligibilite = DossierPrestataire::where('soumission_dossier_ok', 'OUI')->count();
        $prestatairesEligible = DecisionEligibilitePrestataire::where('avis_decision_id', 1)->count();

        $beneficiairesAttenteEligibilite = DossierBeneficiaire::where('soumission_dossier_ok', 'OUI')->count();
        $beneficiairesEligible = DecisionEligibiliteBeneficiaire::where('avis_decision_id', 1)->count();

        $dossierPrestataires = DecisionEligibilitePrestataire::where('avis_decision_id', 1)->get();

        return view('gestionnaire.prestataires.accreditation_level_two', compact(
            'beneficiairesAttenteEligibilite', 'dossierPrestataires',
            'prestatairesAttenteEligibilite', 'beneficiairesEligible', 'prestatairesEligible'));
    }


    public function PrestataireAccreditationNiveau1($id)
    {

        $prestatairesAttenteEligibilite = DossierPrestataire::where('soumission_dossier_ok', 'OUI')->count();
        $prestatairesEligible = DecisionEligibilitePrestataire::where('avis_decision_id', 1)->count();

        $beneficiairesAttenteEligibilite = DossierBeneficiaire::where('soumission_dossier_ok', 'OUI')->count();
        $beneficiairesEligible = DecisionEligibiliteBeneficiaire::where('avis_decision_id', 1)->count();

        $niveauAccreditations = NiveauAccreditation::all();
        $transitionAccreditations = TransitionAccreditation::all();
        $visaDecisions = VisaDecision::all();
        $appreciations = Appreciation::all();
        $mentions = Mention::all();

        $dossierPrestataire = DecisionEligibilitePrestataire::where('dossier_prestataire_id', $id)->first();
//dd($dossierPrestataire);
        $accreditations = Accreditation::with(['transition_accreditation', 'visa_decision', 'niveau_accreditation'])->where('dossier_prestataire_id', $id)->get();



        return view('gestionnaire.prestataires.prestataire_accreditation_level_one', compact(
            'prestatairesEligible', 'beneficiairesEligible', 'appreciations', 'mentions', 'visaDecisions',
            'prestatairesAttenteEligibilite', 'niveauAccreditations', 'dossierPrestataire', 'accreditations',
            'beneficiairesAttenteEligibilite', 'id', 'transitionAccreditations'));
    }


    public function accreditationNiveau1Store(Request $request, $id)
    {

        if ($request->etat_dossier === "1") {

            $notification = array(
                'message' => 'Dossier complet!',
                'alert-type' => 'info'
            );
            $accreditation = Accreditation::create([
                'niveau_accreditation_id' => $request->niveau_accreditation,
                'ref_ancien_accreditation' => $this->refAccreditation($request->ancien_niveau_accreditation),
                'transition_accreditation_id' => $this->refTransitionAccreditation($request->transition_accreditation),
                'dossier_prestataire_id' => $id,
                'visa_decision_id' => $request->visa_decision,
                'appreciation_id' => $request->appreciation,
                'date_decision_accreditation' => $request->date_decision,
                'observation' => $request->observation,

            ]);

            $accreditationNiveau1 = AccreditationNiveau1::create([
                'accreditation_id' => $accreditation->id,
                'etat_dossier_id' => $request->etat_dossier,
                'noteA' => (float)$request->noteA,
                'noteB' => (float)$request->noteB,
                'noteC' => (float)$request->noteC,
                'noteD' => (float)$request->noteD,
                'total' => (float)$request->total,
                'moyenne' => (float)$request->moyenne,
            ]);

            DossierPrestataire::where('id', $id)
                ->update([
                    'niveau1_ok' => "OUI",
                ]);


            return redirect()->route('gestionnaire.prestataire.accreditation_level_one', $id)->with($notification);
        }
        if ($request->etat_dossier === "2") {

            $notification = array(
                'message' => 'Dossier incomplet!',
                'alert-type' => 'info'
            );
            $accreditation = Accreditation::create([
                'niveau_accreditation_id' => $request->niveau_accreditation,
                'ref_ancien_accreditation' => $this->refAccreditation($request->ancien_niveau_accreditation),
                'transition_accreditation_id' => $this->refTransitionAccreditation($request->transition_accreditation),
                'dossier_prestataire_id' => $id,
                'visa_decision_id' => $request->visa_decision,
                'appreciation_id' => $request->appreciation,
                'date_decision_accreditation' => $request->date_decision,
                'observation' => $request->observation,

            ]);

            $accreditationNiveau1 = AccreditationNiveau1::create([
                'accreditation_id' => $accreditation->id,
                'etat_dossier_id' => $request->etat_dossier,
                'noteA' => (float)$request->noteA,
                'noteB' => (float)$request->noteB,
                'noteC' => (float)$request->noteC,
                'noteD' => (float)$request->noteD,
                'total' => (float)$request->total,
                'moyenne' => (float)$request->moyenne,
            ]);

            return redirect()->route('gestionnaire.prestataire.accreditation_level_one', $id)->with($notification);
        }

        return true;
    }


    public function PrestataireAccreditationNiveau2($id)
    {

        $prestatairesAttenteEligibilite = DossierPrestataire::where('soumission_dossier_ok', 'OUI')->count();
        $prestatairesEligible = DecisionEligibilitePrestataire::where('avis_decision_id', 1)->count();

        $beneficiairesAttenteEligibilite = DossierBeneficiaire::where('soumission_dossier_ok', 'OUI')->count();
        $beneficiairesEligible = DecisionEligibiliteBeneficiaire::where('avis_decision_id', 1)->count();

        $dossierPrestataire = DecisionEligibilitePrestataire::where('dossier_prestataire_id', $id)->first();

        $niveauAccreditations = NiveauAccreditation::all();
        $transitionAccreditations = TransitionAccreditation::all();
        $visaDecisions = VisaDecision::all();
        $appreciations = Appreciation::all();
        $mentions = Mention::all();
        $domainCertTechniques = DomaineCertTechnique::all();
        $ancieniveauAccrediation = Accreditation::where('dossier_prestataire_id', $id)->get()->last();

        $noteMoyenne = EpreuveAccreditation::where('accreditation_niveau2_id')->avg('note_finale', 'note_evaluateur');

        $accrediationNiveau2s = Accreditation::where('dossier_prestataire_id', $id)->get();


        $epreuveAccreditations = EpreuveAccreditation::leftJoin('accreditations', 'accreditations.id', '=',
            'epreuve_accreditations.accreditation_niveau2_id')
            ->where('dossier_prestataire_id', $id)
            ->get();

        return view('gestionnaire.prestataires.prestataire_accreditation_level_two', compact(
            'prestatairesEligible', 'beneficiairesEligible', 'accrediationNiveau2s',
            'dossierPrestataire', 'transitionAccreditations', 'epreuveAccreditations',
            'prestatairesAttenteEligibilite', 'beneficiairesAttenteEligibilite', 'domainCertTechniques', 'noteMoyenne',
            'id', 'visaDecisions', 'appreciations', 'mentions', 'niveauAccreditations', 'ancieniveauAccrediation'));
    }


    public function accreditationNiveau2Store(Request $request, $id)
    {

        $lastIdAccreditation = Accreditation::where('dossier_prestataire_id', $id)->get()->last();

        $etatDossier = AccreditationNiveau1::select('etat_dossier_id')->get()->first();

        $lastIdEpreuveAccreditation = session('lastId');


        if ($request->has('note_moyenne')) {


            $accreditation = Accreditation::create([
                'niveau_accreditation_id' => $request->niveau_accreditation,
                'ref_ancien_accreditation' => $lastIdAccreditation->niveau_accreditation_id,
                'transition_accreditation_id' => $request->transition_accreditation,
                'dossier_prestataire_id' => $id,
                'visa_decision_id' => $request->visa_decision,
                'appreciation_id' => $request->appreciation,
                'date_decision_accreditation' => $request->date_decision,
                'observation' => $request->observation,

            ]);

            $accreditationNiveau2 = AccreditationNiveau2::create([
                'accreditation_id' => $accreditation->id,
                'etat_dossier_id' => $etatDossier->etat_dossier_id,
                'moyenne' => (float)$request->note_moyenne,
            ]);

            EpreuveAccreditation::where('id', $lastIdEpreuveAccreditation)->update(['accreditation_niveau2_id' => $accreditation->id]);

            $notification = array(
                'message' => 'Dossier incomplet!',
                'alert-type' => 'info'
            );

            return redirect()->route('gestionnaire.prestataire.accreditation_level_two', $id)->with($notification);

        }

        if ($request->has('volume_horaire')) {

            $lastId = EpreuveAccreditation::create([
                //'accreditation_niveau2_id' => $accreditationNiveau2->id,
                'domaine_cert_technique_id' => $request->domaine_technique_certification,
                'appreciation_id' => $request->appreciation,
                'date_enregistrement' => $request->date_enregistrement,
                'thematique' => $request->thematique,
                'volume_horaire' => $request->volume_horaire,
                'date_debut' => $request->date_debut,
                'date_fin' => $request->date_fin,
                'note_finale' => $request->note_finale_gestionnaire,
                'note_evaluateur' => $request->note_provisoire_evaluateur,
                'observation_evaluateur' => $request->commentaire_evaluateur,
                'observation_gestionnaire' => $request->commentaire_gestionnaire
            ]);

            session(['lastId' => $lastId->id]);

            $notification = array(
                'message' => 'Notation épreuve effectuée avec succès!',
                'alert-type' => 'info'
            );
            return redirect()->route('gestionnaire.prestataire.accreditation_level_two', $id)->with($notification);

        }

    }


    public function indexPrestataire()

    {
        $prestatairesAttenteEligibilite = DossierPrestataire::where('soumission_dossier_ok', 'OUI')->count();
        $prestatairesEligible = DecisionEligibilitePrestataire::where('avis_decision_id', 1)->count();

        $beneficiairesAttenteEligibilite = DossierBeneficiaire::where('soumission_dossier_ok', 'OUI')->count();
        $beneficiairesEligible = DecisionEligibiliteBeneficiaire::where('avis_decision_id', 1)->count();

        $dossierPrestataires = DossierPrestataire::with(['individu', 'decision_eligibilite_prestataires'])
            ->where('soumission_dossier_ok', 'OUI')
            ->get();


        return view('gestionnaire.prestataires.prestataire', compact('dossierPrestataires',
            'prestatairesAttenteEligibilite', 'beneficiairesAttenteEligibilite', 'prestatairesEligible', 'beneficiairesEligible'));
    }


    public function indexBeneficiaire()
    {
        $prestatairesAttenteEligibilite = DossierPrestataire::where('soumission_dossier_ok', 'OUI')->count();
        $prestatairesEligible = DecisionEligibilitePrestataire::where('avis_decision_id', 1)->count();

        $beneficiairesAttenteEligibilite = DossierBeneficiaire::where('soumission_dossier_ok', 'OUI')->count();
        $beneficiairesEligible = DecisionEligibiliteBeneficiaire::where('avis_decision_id', 1)->count();

        $dossierBeneficiaires = DossierBeneficiaire::where('soumission_dossier_ok', 'OUI')->get();


        return view('gestionnaire.beneficiaires.beneficiaire', compact('dossierBeneficiaires',
            'prestatairesAttenteEligibilite',
            'beneficiairesAttenteEligibilite', 'prestatairesEligible', 'beneficiairesEligible'));
    }


    public function showBeneficiaire($id)
    {
        $prestatairesAttenteEligibilite = DossierPrestataire::where('soumission_dossier_ok', 'OUI')->count();
        $prestatairesEligible = DecisionEligibilitePrestataire::where('avis_decision_id', 1)->count();

        $beneficiairesAttenteEligibilite = DossierBeneficiaire::where('soumission_dossier_ok', 'OUI')->count();
        $beneficiairesEligible = DecisionEligibiliteBeneficiaire::where('avis_decision_id', 1)->count();

        $dossierBeneficiaire = DossierBeneficiaire::where('id', $id)->first();
        $avisDecisions = AvisDecision::all();
        $filenames = DocumentUpload::where('compte_utilisateur_id', $dossierBeneficiaire->compte_utilisateur->id)->get();
        $decisionEligibiliteBeneficiaire = DecisionEligibiliteBeneficiaire::where('dossier_beneficiaire_id', $id)->first();

        return view('gestionnaire.beneficiaires.show', compact('dossierBeneficiaire'
            , 'avisDecisions', 'filenames', 'decisionEligibiliteBeneficiaire', 'prestatairesAttenteEligibilite',
            'beneficiairesAttenteEligibilite', 'prestatairesEligible', 'beneficiairesEligible'));
    }


    public function showPrestataire($id)
    {
        $prestatairesAttenteEligibilite = DossierPrestataire::where('soumission_dossier_ok', 'OUI')->count();
        $prestatairesEligible = DecisionEligibilitePrestataire::where('avis_decision_id', 1)->count();

        $beneficiairesAttenteEligibilite = DossierBeneficiaire::where('soumission_dossier_ok', 'OUI')->count();
        $beneficiairesEligible = DecisionEligibiliteBeneficiaire::where('avis_decision_id', 1)->count();

        $avisDecisions = AvisDecision::all();
        $dossierPrestataire = DossierPrestataire::where('id', $id)->first();
        $typePrestationDispensees = TypePrestationDispensee::where('dossier_prestataire_id', $dossierPrestataire->id)->get();
        $employeurs = Employeur::where('dossier_prestataire_id', $dossierPrestataire->id)->get();
        $competenceLinguistiqueExperts = CompetenceLinExpert::where('dossier_prestataire_id', $dossierPrestataire->id)->get();
        $experienceChaineValeurExperts = ExperienceChaineValeurExpert::where('dossier_prestataire_id', $dossierPrestataire->id)->get();
        $referenceClients = ReferenceClientExpert::where('dossier_prestataire_id', $dossierPrestataire->id)->get();
        $filenames = DocumentUpload::where('compte_utilisateur_id', $dossierPrestataire->compte_utilisateur->id)->get();
        $decisionEligibilitePrestataire = DecisionEligibilitePrestataire::where('dossier_prestataire_id', $id)->first();

        return view('gestionnaire.prestataires.show', compact('dossierPrestataire',
            'typePrestationDispensees', 'employeurs', 'referenceClients', 'filenames', 'decisionEligibilitePrestataire',
            'competenceLinguistiqueExperts', 'experienceChaineValeurExperts', 'avisDecisions',
            'prestatairesAttenteEligibilite', 'beneficiairesAttenteEligibilite', 'prestatairesEligible', 'beneficiairesEligible'));
    }


    public function indexCluster()
    {
        $prestatairesAttenteEligibilite = DossierPrestataire::where('soumission_dossier_ok', 'OUI')->count();
        $prestatairesEligible = DecisionEligibilitePrestataire::where('avis_decision_id', 1)->count();

        $beneficiairesAttenteEligibilite = DossierBeneficiaire::where('soumission_dossier_ok', 'OUI')->count();
        $beneficiairesEligible = DecisionEligibiliteBeneficiaire::where('avis_decision_id', 1)->count();

        $clusters = Cluster::all();

        return view('gestionnaire.cluster.index', compact('prestatairesAttenteEligibilite', 'clusters',
            'beneficiairesAttenteEligibilite', 'prestatairesEligible', 'beneficiairesEligible'));
    }

    public function createCluster()
    {

        $prestatairesAttenteEligibilite = DossierPrestataire::where('soumission_dossier_ok', 'OUI')->count();
        $prestatairesEligible = DecisionEligibilitePrestataire::where('avis_decision_id', 1)->count();

        $beneficiairesAttenteEligibilite = DossierBeneficiaire::where('soumission_dossier_ok', 'OUI')->count();
        $beneficiairesEligible = DecisionEligibiliteBeneficiaire::where('avis_decision_id', 1)->count();

        $clusters = Cluster::all();

        $chaineValeurs = ChaineValeur::all();
        $villes = CommuneVille::all();
        $departements = Departement::all();
        $roleMembreClusters = RoleMembreCluster::all();
        $structureBeneficiaires = DossierBeneficiaire::all();

        return view('gestionnaire.cluster.create', compact('prestatairesAttenteEligibilite', 'clusters',
            'beneficiairesAttenteEligibilite', 'villes', 'departements', 'roleMembreClusters',
            'prestatairesEligible', 'beneficiairesEligible', 'chaineValeurs', 'structureBeneficiaires'));
    }


    public function showTdr(Request $request, Tdr $tdr)
    {

        $prestatairesAttenteEligibilite = DossierPrestataire::where('soumission_dossier_ok', 'OUI')->count();
        $prestatairesEligible = DecisionEligibilitePrestataire::where('avis_decision_id', 1)->count();

        $beneficiairesAttenteEligibilite = DossierBeneficiaire::where('soumission_dossier_ok', 'OUI')->count();
        $beneficiairesEligible = DecisionEligibiliteBeneficiaire::where('avis_decision_id', 1)->count();

        return view('gestionnaire.validation.demande.show', compact('tdr',
            'prestatairesEligible', 'beneficiairesEligible', 'beneficiairesAttenteEligibilite', 'prestatairesAttenteEligibilite'));
    }


    public function showValidation(Request $request, Tdr $tdr)
    {

        $prestatairesAttenteEligibilite = DossierPrestataire::where('soumission_dossier_ok', 'OUI')->count();
        $prestatairesEligible = DecisionEligibilitePrestataire::where('avis_decision_id', 1)->count();

        $beneficiairesAttenteEligibilite = DossierBeneficiaire::where('soumission_dossier_ok', 'OUI')->count();
        $beneficiairesEligible = DecisionEligibiliteBeneficiaire::where('avis_decision_id', 1)->count();

        $visaDecisions = VisaDecision::all();

        return view('gestionnaire.validation.demande.valider', compact('visaDecisions', 'tdr',
            'prestatairesEligible', 'beneficiairesEligible', 'beneficiairesAttenteEligibilite', 'prestatairesAttenteEligibilite'));
    }


    public function indexTdr()
    {
        $prestatairesAttenteEligibilite = DossierPrestataire::where('soumission_dossier_ok', 'OUI')->count();
        $prestatairesEligible = DecisionEligibilitePrestataire::where('avis_decision_id', 1)->count();

        $beneficiairesAttenteEligibilite = DossierBeneficiaire::where('soumission_dossier_ok', 'OUI')->count();
        $beneficiairesEligible = DecisionEligibiliteBeneficiaire::where('avis_decision_id', 1)->count();

        $tdrs = Tdr::all();
        $visaDecisions = VisaDecision::all();

        return view('gestionnaire.validation.demande.index', compact('prestatairesAttenteEligibilite',
            'beneficiairesAttenteEligibilite', 'prestatairesEligible', 'beneficiairesEligible', 'tdrs', 'visaDecisions'));
    }

    public function storeCircuitValidation(Request $request)
    {

        $notification = array(
            'message' => 'Votre TDR validé avec succès!',
            'alert-type' => 'success'
        );

        $tdr = Tdr::where('id', $request->tdr_id)->get()->first();
        $fullName = $tdr->beneficiaire;
        $parts = explode(' ', $fullName);

        $lastname = $parts[0];
        $firstname = $parts[1];
        $matchThese = ['nom' => trim($lastname), 'prenom' => trim($firstname)];
        $dossierBeneficiaire = DossierBeneficiaire::where($matchThese)->get()->first();

        $demandePrestation = DemandePrestation::where('dossier_beneficiaire_id', $dossierBeneficiaire->id)->get()->last();

        Tdr::where('id', $request->tdr_id)
            ->update([
                'visa_due' => $request->visa_due,
                'visa_ons' => $request->visa_ons,
                'demande_prestation_id' => $demandePrestation->id,
                'date_approbation_tdr_on' => $request->date_approbation_tdr_on,
                'date_approbation_tdr_due' => $request->date_approbation_tdr_due,
                'date_approbation_cv_on' => $request->date_approbation_cv_on,
                'date_approbation_cv_due' => $request->date_approbation_cv_due,
                'date_reception_cv_siege_agrer' => $request->date_reception_cv_siege_agrer,
                'observations' => $request->observations,
            ]);
        return redirect()->route('gestionnaire.tdr.circuit-validation.create')->with($notification);
    }


    public function createRapportAnalyse()
    {
        $prestatairesAttenteEligibilite = DossierPrestataire::where('soumission_dossier_ok', 'OUI')->count();
        $prestatairesEligible = DecisionEligibilitePrestataire::where('avis_decision_id', 1)->count();

        $beneficiairesAttenteEligibilite = DossierBeneficiaire::where('soumission_dossier_ok', 'OUI')->count();
        $beneficiairesEligible = DecisionEligibiliteBeneficiaire::where('avis_decision_id', 1)->count();

        $dossierPrestataires = DossierPrestataire::with(['individu', 'decision_eligibilite_prestataires'])
            ->where('soumission_dossier_ok', 'OUI')
            ->where('niveau1_ok', 'OUI')
            ->get();
        $ids = array();
        foreach ($dossierPrestataires as $dossierPrestataire) {
            $ids[] = $dossierPrestataire->id;
        }
        $familleInterventions = FamilleIntervention::all();
        $departements = Departement::all();
        $degreMaitriseLangues = NiveauMaitrise::all();
        $niveauAccreditations = NiveauAccreditation::all();
        $zoneInterventions = ZoneIntervention::all();
        $disponiblites = Disponibilite::all();
        $nationalites = PaysNationalite::all();


        $comptenceLinguistiques = CompetenceLinExpert::whereIn('dossier_prestataire_id', $ids)->get();

        return view('gestionnaire.rapports.create', compact('prestatairesAttenteEligibilite',
            'zoneInterventions', 'disponiblites', 'nationalites', 'comptenceLinguistiques', 'familleInterventions',
            'departements', 'degreMaitriseLangues', 'niveauAccreditations', 'beneficiairesAttenteEligibilite',
            'prestatairesEligible', 'beneficiairesEligible', 'dossierPrestataires'));
    }


    public function storeRapportAnalyse()
    {

    }


    public function createContrat()
    {
        $prestatairesAttenteEligibilite = DossierPrestataire::where('soumission_dossier_ok', 'OUI')->count();
        $prestatairesEligible = DecisionEligibilitePrestataire::where('avis_decision_id', 1)->count();

        $beneficiairesAttenteEligibilite = DossierBeneficiaire::where('soumission_dossier_ok', 'OUI')->count();
        $beneficiairesEligible = DecisionEligibiliteBeneficiaire::where('avis_decision_id', 1)->count();

        $tdrs = Tdr::all();

        return view('gestionnaire.contrat.create', compact('prestatairesAttenteEligibilite', 'tdrs',
            'beneficiairesAttenteEligibilite', 'prestatairesEligible', 'beneficiairesEligible'));
    }


    public function storeContrat(Request $request)
    {


    }


    public function createContributionBeneficiaire()
    {
        $prestatairesAttenteEligibilite = DossierPrestataire::where('soumission_dossier_ok', 'OUI')->count();
        $prestatairesEligible = DecisionEligibilitePrestataire::where('avis_decision_id', 1)->count();

        $beneficiairesAttenteEligibilite = DossierBeneficiaire::where('soumission_dossier_ok', 'OUI')->count();
        $beneficiairesEligible = DecisionEligibiliteBeneficiaire::where('avis_decision_id', 1)->count();

        $devises = Devise::all();

        return view('gestionnaire.contrat.contribution.create', compact('prestatairesAttenteEligibilite', 'devises',
            'beneficiairesAttenteEligibilite', 'prestatairesEligible', 'beneficiairesEligible'));
    }


    public function storeContributionBeneficiaire(Request $request)
    {
        dd($request->all());
        $notification = array(
            'message' => 'Quote part enregistrée avec succès!',
            'alert-type' => 'success'
        );

        $versement = Versement::create([
            'date_enregistrement' => $request->date_enregistrement,
            'date_versement' => $request->date_versement,
            'montant_contribution' => $request->montant_contribution,
            'taux_contribution' => $request->taux_contribution,
            'devise' => $request->devise,
            'taux' => $request->taux,
            'observation' => $request->observations,
        ]);
        return redirect()->route('gestionnaire.contribution.beneficiaire.create')->with($notification);
    }


    public function search(Request $request)
    {
        //dd($request->all());
        $query = $request->get('query');
        if ($query != "") {
            $users = User::where('last_name', 'LIKE', '%' . $query . '%')
                ->orWhere('first_name', 'LIKE', '%' . $query . '%')
                ->paginate(5);
            if ($users != null) {
                return view('user.index', compact('users'));
            }

        } else {
            $users = User::orderBy('last_name', 'asc')->paginate(10);
            return view('user.index', compact('users'));
        }
    }


    public function advancedSearch(Request $request)
    {
        //dd($request->all());
        $query = $request->get('query');
        if ($query != "") {
            $users = User::where('last_name', 'LIKE', '%' . $query . '%')
                ->orWhere('first_name', 'LIKE', '%' . $query . '%')
                ->paginate(5);
            if ($users != null) {
                return view('user.index', compact('users'));
            }

        } else {
            $users = User::orderBy('last_name', 'asc')->paginate(10);
            return view('user.index', compact('users'));
        }
    }


    public function storeCluster(Request $request)
    {


        $dossierBeneficiaire = DossierBeneficiaire::where('identifiant_prcce', $request->identifiant_prcce)->get()->first();
        Cluster::create([
            'dossier_beneficiaire_id' => $dossierBeneficiaire->id,
            'compte_utilisateur_id' => $dossierBeneficiaire->compte_utilisateur_id,
            'chaine_valeur_id' => $request->chaine_valeur,
            'president_inidividu_id' => $request->president_id,
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
        return redirect()->route('gestionnaire-cluster.create');
    }


    public function storeClusterAdhesion(Request $request)
    {

        //$dossierBeneficiaire = DossierBeneficiaire::where('id',$request->structure_beneficiaire)->get()->first();
        $dossierBeneficiaire = DossierBeneficiaire::where('id', 2)->get()->first();
        //dd($dossierBeneficiaire);
        Adhesion::create([
            'cluster_dossier_beneficiaire_id' => $dossierBeneficiaire->id,
            'role_membre_cluster_id' => $request->role_membre_cluster,
            'structure_beneficiaire' => $request->structure_beneficiaire,
            'date_entree' => $request->date_entree,
            'date_sortie' => $request->date_sortie,
            'motif_sortie' => $request->motif_sortie,
            'commentaire' => $request->commentaire_gestionnaire
        ]);
        return redirect()->route('gestionnaire-cluster.create');
    }


    public function eligibilitePrestataire(Request $request, $id)
    {


        if ($request->etat_dossier === "incomplet") {

            $notification = array(
                'message' => 'Dossier incomplet!',
                'alert-type' => 'info'
            );

            $decisionEligibilitePrestataire = DecisionEligibilitePrestataire::updateOrCreate(['dossier_prestataire_id' => $id],
                [
                    'observation' => $request->observation,
                    'dossier_prestataire_id' => $id,
                    'avis_decision_id' => $request->avis_decision
                ]);


            EligibilitePrestataire::where('dossier_prestataire_id', $id)
                ->update([
                    'observation' => $request->observation,
                    'dossier_prestataire_id' => $id,
                    'decision_eligibilite_id' => $decisionEligibilitePrestataire->id
                ]);

            $accreditation = Accreditation::create([
                'dossier_prestataire_id' => $id
            ]);

            AccreditationNiveau1::create([
                'accreditation_id' => $accreditation->id,
            ]);

            return redirect()->route('gestionnaire.prestataire')->with($notification);

        } else if ($request->etat_dossier === "complet") {

            $notification = array(
                'message' => 'Dossier complet!',
                'alert-type' => 'info'
            );

            $decisionEligibilitePrestataire = DecisionEligibilitePrestataire::updateOrCreate(['dossier_prestataire_id' => $id], [
                'observation' => $request->observation,
                'dossier_prestataire_id' => $id,
                'avis_decision_id' => $request->avis_decision
            ]);


            DossierPrestataire::where('id', $id)
                ->update(['situation_dossier' => 'COMPLET']);


            EligibilitePrestataire::where('dossier_prestataire_id', $id)
                ->update([
                    'observation' => $request->observation,
                    'dossier_prestataire_id' => $id,
                    'decision_eligibilite_id' => $decisionEligibilitePrestataire->id
                ]);

            $accreditation = Accreditation::create([
                'dossier_prestataire_id' => $id
            ]);

            AccreditationNiveau1::create([
                'accreditation_id' => $accreditation->id,
            ]);

            return redirect()->route('gestionnaire.prestataire')->with($notification);

        }


    }


    public function eligibiliteBeneficiaire(Request $request, $id)
    {


        if ($request->etat_dossier === "incomplet") {

            $notification = array(
                'message' => 'Dossier incomplet!',
                'alert-type' => 'info'
            );

            $decisionEligibiliteBeneficiaire = DecisionEligibiliteBeneficiaire::updateOrCreate(['dossier_beneficiaire_id' => $id], [
                'observation' => $request->observation,
                'dossier_prestataire_id' => $id,
                'avis_decision_id' => $request->avis_decision
            ]);


            EligibiliteBeneficiaire::where('dossier_beneficiaire_id', $id)
                ->update([
                    'observation' => $request->observation,
                    'dossier_beneficiaire_id' => $id,
                    'decision_eligibilite_id' => $decisionEligibiliteBeneficiaire->id
                ]);
            return redirect()->route('gestionnaire.beneficiaire')->with($notification);

        } else if ($request->etat_dossier === "complet") {

            $notification = array(
                'message' => 'Dossier complet!',
                'alert-type' => 'info'
            );

            $decisionEligibiliteBeneficiaire = DecisionEligibiliteBeneficiaire::updateOrCreate(['dossier_beneficiaire_id' => $id], [
                'observation' => $request->observation,
                'dossier_beneficiaire_id' => $id,
                'avis_decision_id' => $request->avis_decision
            ]);


            DossierBeneficiaire::where('id', $id)
                ->update(['situation_dossier' => 'COMPLET']);


            EligibiliteBeneficiaire::where('dossier_beneficiaire_id', $id)
                ->update([
                    'observation' => $request->observation,
                    'dossier_beneficiaire_id' => $id,
                    'decision_eligibilite_id' => $decisionEligibiliteBeneficiaire->id
                ]);

            return redirect()->route('gestionnaire.beneficiaire')->with($notification);

        }

        return false;

    }


    protected function refAccreditation($accreditation_label)
    {
        switch ($accreditation_label) {
            case "Aucune accréditation":
                return 1;
                break;
            case "Accréditation de niveau 1":
                return 2;
                break;
            case "Accréditation de niveau 2":
                return 3;
                break;
            case "Accréditation de niveau 3":
                return 4;
        }
    }


    protected function refTransitionAccreditation($transition_accreditation_label)
    {
        switch ($transition_accreditation_label) {
            case "Progression":
                return 1;
                break;
            case "Régression":
                return 2;
                break;
            case "Maintien":
                return 3;
                break;

        }
    }


}
