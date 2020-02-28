<?php

namespace App\Http\Controllers;

use App\Models\Accreditation;
use App\Models\AccreditationNiveau1;
use App\Models\Appreciation;
use App\Models\AvisDecision;
use App\Models\CompetenceLinExpert;
use App\Models\DecisionEligibiliteBeneficiaire;
use App\Models\DecisionEligibilitePrestataire;
use App\Models\DocumentUpload;
use App\Models\DossierBeneficiaire;
use App\Models\DossierPrestataire;
use App\Models\EligibiliteBeneficiaire;
use App\Models\EligibilitePrestataire;
use App\Models\Employeur;
use App\Models\ExperienceChaineValeurExpert;
use App\Models\Mention;
use App\Models\NiveauAccreditation;
use App\Models\ReferenceClientExpert;
use App\Models\TransitionAccreditation;
use App\Models\TypePrestationDispensee;
use App\Models\VisaDecision;
use Illuminate\Http\Request;

class GestionnaireController extends Controller
{


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


        $dossierPrestataires = DecisionEligibilitePrestataire::where('avis_decision_id', 1)->get();


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
        $accreditations = Accreditation::with(['transition_accreditation', 'visa_decision', 'niveau_accreditation'])->where('dossier_prestataire_id', $id)->get();
        //dd($accreditations);


        return view('gestionnaire.prestataires.prestataire_accreditation_level_one', compact(
            'prestatairesEligible', 'beneficiairesEligible', 'appreciations', 'mentions', 'visaDecisions',
            'prestatairesAttenteEligibilite', 'niveauAccreditations', 'dossierPrestataire', 'accreditations',
            'beneficiairesAttenteEligibilite', 'id', 'transitionAccreditations'));
    }


    public function accreditationNiveau1Store(Request $request, $id)
    {
        //dd($request->all());
        $notification = array(
            'message' => 'Vérification terminée!',
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


        return view('gestionnaire.prestataires.prestataire_accreditation_level_two', compact(
            'prestatairesEligible', 'beneficiairesEligible', 'dossierPrestataire', 'transitionAccreditations',
            'prestatairesAttenteEligibilite', 'beneficiairesAttenteEligibilite',
            'id', 'visaDecisions', 'appreciations', 'mentions', 'niveauAccreditations'));
    }


    public function accreditationNiveau2Store(Request $request, $id)
    {
        $notification = array(
            'message' => 'Vérification terminée!',
            'alert-type' => 'info'
        );

        $accreditation = Accreditation::create([
            'niveau_accreditation_id' => $request->niveau_accreditation,
            'ref_ancien_accreditation' => $request->ancien_niveau_accreditation,
            'transition_accreditation_id' => $request->transition_accreditation,
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

        return redirect()->route('gestionnaire.prestataire.accreditation_level_two', $id)->with($notification);
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


    public function eligibilitePrestataire(Request $request, $id)
    {


        if ($request->etat_dossier === "incomplet") {

            $notification = array(
                'message' => 'Dossier incomplet!',
                'alert-type' => 'info'
            );

            $decisionEligibilitePrestataire = DecisionEligibilitePrestataire::updateOrCreate(['dossier_prestataire_id' => $id], [
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
