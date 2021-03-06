<?php

namespace App\Http\Controllers;

use App\Models\Accreditation;
use App\Models\CommuneVille;
use App\Models\CompteUtilisateur;
use App\Models\DecisionEligibiliteBeneficiaire;
use App\Models\DecisionEligibilitePrestataire;
use App\Models\DocumentUpload;
use App\Models\DossierBeneficiaire;
use App\Models\DossierPrestataire;
use App\Models\EligibiliteBeneficiaire;
use App\Models\EligibilitePrestataire;
use App\Models\Individu;
use App\Models\User;
use App\Traits\ImageUploaderTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CompteUtilisateurController extends Controller
{
    use ImageUploaderTrait;

    public function __construct()
    {
        $this->middleware('auth')->except('store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'message' => 'Votre compte a été crée avec succès!',
            'alert-type' => 'success'
        );

        $request->validate([
            'type_compte' => 'required',
            'civilite' => 'required',
            'nom' => 'required',
            'sexe' => 'required',
            'prenom' => 'required',
            'login' => 'required',
            'password' => 'required|confirmed|min:8',
            'email' => 'required|confirmed',

        ]);


        User::create([
            'login' => $request['login'],
            'password' => bcrypt($request['password']),
            'nom' => $request['nom'],
            'prenom' => $request['prenom'],
            'email' => $request['email'],
            'type_compte' => $request['type_compte']
        ]);


        if ($request['type_compte'] === "prestataire") {

            $individu_last_id = Individu::create([
                'nom' => $request['nom'],
                'prenom' => $request['prenom'],
                'civilite_id' => $request['civilite'],
                'genre_sexe_id' => $request['sexe']
            ]);

            $compte_utilisateur_last_id = CompteUtilisateur::create([
                'civilite_id' => $request['civilite'],
                'genre_sexe_id' => $request['sexe'],
                'nom' => $request['nom'],
                'prenom' => $request['prenom'],
                'login' => $request['login'],
                'password' => bcrypt($request['password']),
                'email' => $request['email'],
                'type_compte' => $request['type_compte'],
                'question_securite' => $request['question_securite'],
                'reponse_question_securite' => $request['reponse_question_securite'],
                'non_fonction_publique' => $request['non_fonction_publique'],
                'accord_usage_donnees' => $request['accord_usage_donnees'],
                'accord_reception_info' => $request['accord_reception_info']
            ]);

            $dossierPrestataire = DossierPrestataire::create([
                'compte_utilisateur_id' => $compte_utilisateur_last_id->id,
                'individu_id' => $individu_last_id->id,
            ]);


            $decisionEligibilitePrestataire = DecisionEligibilitePrestataire::create([
                'dossier_prestataire_id' => $dossierPrestataire->id,
                'avis_decision_id' => 3,
                'observation' => "Dossier en attente d'examination"
            ]);

            EligibilitePrestataire::create([
                'dossier_prestataire_id' => $dossierPrestataire->id,
                'decision_eligibilite_id' => $decisionEligibilitePrestataire->id,
                'observation' => "Dossier en attente d'examination"
            ]);

            //Mail::to($request['email'])->send(new NotificationFormMail($request->only('nom','prenom','civilite','type_compte')));

            return redirect()->route('home')->with($notification);

        } else if ($request['type_compte'] === "beneficiaire") {

            $individu_last_id = Individu::create([
                'nom' => $request['nom'],
                'prenom' => $request['prenom'],
                'civilite_id' => $request['civilite'],
                'genre_sexe_id' => $request['sexe']
            ]);

            $compte_utilisateur_last_id = CompteUtilisateur::create([
                'civilite_id' => $request['civilite'],
                'genre_sexe_id' => $request['sexe'],
                'nom' => $request['nom'],
                'prenom' => $request['prenom'],
                'login' => $request['login'],
                'password' => bcrypt($request['password']),
                'email' => $request['email'],
                'type_compte' => $request['type_compte'],
                'question_securite' => $request['question_securite'],
                'reponse_question_securite' => $request['reponse_question_securite'],
                'non_fonction_publique' => $request['non_fonction_publique'],
                'accord_usage_donnees' => $request['accord_usage_donnees'],
                'accord_reception_info' => $request['accord_reception_info']
            ]);

            $dossierBeneficiaire = DossierBeneficiaire::create([
                'compte_utilisateur_id' => $compte_utilisateur_last_id->id,
                'nom' => $request['nom'],
                'prenom' => $request['prenom'],
                'email' => $request['email'],
                'individu_id' => $individu_last_id->id,
            ]);

            $decisionEligibiliteBeneficaire = DecisionEligibiliteBeneficiaire::create([
                'dossier_beneficiaire_id' => $dossierBeneficiaire->id,
                'avis_decision_id' => 3,
                'observation' => "Dossier en attente d'examination"
            ]);

            EligibiliteBeneficiaire::create([
                'dossier_beneficiaire_id' => $dossierBeneficiaire->id,
                'decision_eligibilite_id' => $decisionEligibiliteBeneficaire->id,
                'observation' => "Dossier en attente d'examination"
            ]);


            //Mail::to($request['email'])->send(new NotificationFormMail($request->only('nom','prenom','civilite','type_compte')));

            return redirect()->route('home')->with($notification);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\CompteUtilisateur $compteUtilisateur
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(CompteUtilisateur $compteUtilisateur)
    {


        if ($compteUtilisateur->type_compte === "prestataire") {

            $dossierPrestataire = DossierPrestataire::where('compte_utilisateur_id', $compteUtilisateur->id)->first();

            $decisionEligiblitePrestataire = DecisionEligibilitePrestataire::where('dossier_prestataire_id', $dossierPrestataire->id)->first();

            $infoComplementaires = Individu::find($dossierPrestataire->individu_id);

            $communeVille = CommuneVille::where('pays_nationalite_id', $infoComplementaires->pays_nationalite_id)->first();

            $filenames = DocumentUpload::where('compte_utilisateur_id', $compteUtilisateur->id)->get();

            $accreditation = Accreditation::with('accreditation_niveau1')
                ->where('dossier_prestataire_id', $dossierPrestataire->id)->latest()->first();

            return view('prestataire.profile', compact('compteUtilisateur', 'decisionEligiblitePrestataire',
                'infoComplementaires', 'communeVille', 'dossierPrestataire', 'filenames', 'accreditation'));

        } else if ($compteUtilisateur->type_compte === "beneficiaire") {

            $dossierBeneficiaire = DossierBeneficiaire::where('compte_utilisateur_id', $compteUtilisateur->id)->first();
            $filenames = DocumentUpload::where('compte_utilisateur_id', $compteUtilisateur->id)->get();
            $decisionEligibiliteBeneficiaire = DecisionEligibiliteBeneficiaire::where('dossier_beneficiaire_id', $dossierBeneficiaire->id)->first();

            return view('beneficiaire.profile', compact('dossierBeneficiaire'
                , 'filenames', 'compteUtilisateur', 'decisionEligibiliteBeneficiaire'));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\CompteUtilisateur $compteUtilisateur
     * @return \Illuminate\Http\Response
     */
    public function edit(CompteUtilisateur $compteUtilisateur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CompteUtilisateur $compteUtilisateur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompteUtilisateur $compteUtilisateur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\CompteUtilisateur $compteUtilisateur
     * @return void
     */
    public function destroy(CompteUtilisateur $compteUtilisateur)
    {
        //
    }

    public function updatePhoto(Request $request)
    {
        $notification = array(
            'message' => 'Votre photo de profil a été mise à jour avec succès!',
            'alert-type' => 'success'
        );

        $request->validate([

            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $beneficiare = CompteUtilisateur::findOrFail(auth()->user()->id);
        $user = User::findOrFail(auth()->user()->id);

        if ($request->has('photo')) {
            $image = $request->file('photo');
            $name = Str::slug($beneficiare->id . '_' . $beneficiare->nom . '_' . $beneficiare->prenom . '_' . time());
            $folder = '/photos/profil/';
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
            $this->uploadOne($image, $folder, 'uploads', $name);
            $beneficiare->profile_image = $filePath;
            $user->profile_image = $filePath;
        }

        $beneficiare->save();
        $user->save();

        return redirect()->route('profile.show', Auth::user())->with($notification);

    }

}
