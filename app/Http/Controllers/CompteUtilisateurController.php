<?php

namespace App\Http\Controllers;

use App\Models\CommuneVille;
use App\Models\CompteUtilisateur;
use App\Models\DocumentUpload;
use App\Models\DossierBeneficiaire;
use App\Models\DossierPrestataire;
use App\Models\Individu;
use App\Models\User;
use Illuminate\Http\Request;

class CompteUtilisateurController extends Controller
{
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

            DossierPrestataire::create([
                'compte_utilisateur_id' => $compte_utilisateur_last_id->id,
                'individu_id' => $individu_last_id->id,
            ]);

            // Mail::to($request['email'])->send(new NotificationFormMail($request->only('nom','prenom','civilite','type_compte')));

            return redirect()->route('login');

        } else if ($request['type_compte'] === "beneficiaire") {
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

            DossierBeneficiaire::create([
                'compte_utilisateur_id' => $compte_utilisateur_last_id->id,
                'nom' => $request['nom'],
                'prenom' => $request['prenom'],
                'email' => $request['email']
            ]);
            //Mail::to($request['email'])->send(new NotificationFormMail($request->only('nom','prenom','civilite','type_compte')));

            return redirect()->route('login');
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
            $infoComplementaires = Individu::find($dossierPrestataire->individu_id);

            $communeVille = CommuneVille::where('pays_nationalite_id', $infoComplementaires->pays_nationalite_id)->first();

            $filenames = DocumentUpload::where('compte_utilisateur_id', $compteUtilisateur->id)->get();

            return view('prestataire.profile', compact('compteUtilisateur',
                'infoComplementaires', 'communeVille', 'dossierPrestataire', 'filenames'));
        } else if ($compteUtilisateur->type_compte === "beneficiaire") {

            $dossierBeneficiaire = DossierBeneficiaire::where('compte_utilisateur_id', $compteUtilisateur->id)->first();
            $filenames = DocumentUpload::where('compte_utilisateur_id', $compteUtilisateur->id)->get();


            return view('beneficiaire.profile', compact('dossierBeneficiaire'
                , 'filenames', 'compteUtilisateur'));
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

}
