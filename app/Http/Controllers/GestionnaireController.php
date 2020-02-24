<?php

namespace App\Http\Controllers;

use App\Models\AvisDecision;
use App\Models\CompetenceLinExpert;
use App\Models\DecisionEligibilitePrestataire;
use App\Models\DocumentUpload;
use App\Models\DossierBeneficiaire;
use App\Models\DossierPrestataire;
use App\Models\EligibilitePrestataire;
use App\Models\Employeur;
use App\Models\ExperienceChaineValeurExpert;
use App\Models\ReferenceClientExpert;
use App\Models\TypePrestationDispensee;
use Illuminate\Http\Request;

class GestionnaireController extends Controller
{


    public function index()
    {
        return view('gestionnaire.index');
    }

    public function indexPrestataire()

    {
        $dossierPrestataires = DossierPrestataire::with(['individu'])
            ->where('soumission_dossier_ok', 'OUI')
            ->get();


        return view('gestionnaire.prestataires.prestataire', compact('dossierPrestataires'));
    }

    public function indexBeneficiaire()
    {
        $dossierBeneficiaires = DossierBeneficiaire::where('soumission_dossier_ok', 'OUI')->get();
        return view('gestionnaire.beneficiaires.beneficiaire', compact('dossierBeneficiaires'));
    }

    public function showBeneficiaire($id)
    {
        $dossierBeneficiaire = DossierBeneficiaire::where('id', $id)->get();
        return view('gestionnaire.beneficiaires.show', compact('dossierBeneficiaire'));
    }

    public function showPrestataire($id)
    {
        $avisDecisions = AvisDecision::all();
        $dossierPrestataire = DossierPrestataire::where('id', $id)->first();
        $typePrestationDispensees = TypePrestationDispensee::where('dossier_prestataire_id', $dossierPrestataire->id)->get();
        $employeurs = Employeur::where('dossier_prestataire_id', $dossierPrestataire->id)->get();
        $competenceLinguistiqueExperts = CompetenceLinExpert::where('dossier_prestataire_id', $dossierPrestataire->id)->get();
        $experienceChaineValeurExperts = ExperienceChaineValeurExpert::where('dossier_prestataire_id', $dossierPrestataire->id)->get();
        $referenceClients = ReferenceClientExpert::where('dossier_prestataire_id', $dossierPrestataire->id)->get();
        $filenames = DocumentUpload::where('compte_utilisateur_id', $dossierPrestataire->compte_utilisateur->id)->get();
        //dd($filenames);
        return view('gestionnaire.prestataires.show', compact('dossierPrestataire',
            'typePrestationDispensees', 'employeurs', 'referenceClients', 'filenames',
            'competenceLinguistiqueExperts', 'experienceChaineValeurExperts', 'avisDecisions'));
    }


    public function eligibilitePrestataire(Request $request, $id)
    {

        $dossierPrestataire = DossierPrestataire::where('compte_utilisateur_id', $id)->first();

        if ($request->etat_dossier === "incomplet") {

            $decisionEligibilitePrestataire = DecisionEligibilitePrestataire::create([
                'observation' => $request->observation,
                'dossier_prestataire_id' => $dossierPrestataire->id,
                'avis_decision_id' => $request->avis_decision
            ]);

            EligibilitePrestataire::create([
                'observation' => $request->observation,
                'dossier_prestataire_id' => $dossierPrestataire->id,
                'decision_eligibilite_id' => $decisionEligibilitePrestataire->id

            ]);

        } else if ($request->etat_dossier === "complet") {

            $decisionEligibilitePrestataire = DecisionEligibilitePrestataire::create([
                'observation' => $request->observation,
                'dossier_prestataire_id' => $dossierPrestataire->id,
                'avis_decision_id' => $request->avis_decision
            ]);

            DossierPrestataire::where('compte_utilisateur_id', $id)
                ->update(['situation_dossier' => 'COMPLET']);


            EligibilitePrestataire::create([
                'observation' => $request->observation,
                'dossier_prestataire_id' => $dossierPrestataire->id,
                'decision_eligibilite_id' => $decisionEligibilitePrestataire->id
            ]);

        }


    }


}
