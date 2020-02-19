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


        $info_compte = [
            'type_compte_id' => $request['type_compte'],
            'civilite_id' => $request['civilite'],
            'genre_sexe_id' => $request['sexe'],
            'nom' => $request['nom'],
            'prenom' => $request['prenom'],
            'login' => $request['login'],
            'password' => bcrypt($request['password']),
            'email' => $request['email'],
            'question_securite' => $request['question_securite'],
            'reponse_question_securite' => $request['reponse_question_securite'],
            'non_fonction_publique' => $request['non_fonction_publique'],
            'accord_usage_donnees' => $request['accord_usage_donnees'],
            'accord_reception_info' => $request['accord_reception_info'],
        ];

        User::create([
            'login' => $request['login'],
            'password' => bcrypt($request['password']),
            'nom' => $request['nom'],
            'prenom' => $request['prenom'],
            'email' => $request['email'],
            'type_compte_id' => $request['type_compte']
        ]);

        if ($request['type_compte'] == "1") {
            return redirect()->route('login');
        }

        $compte_utilisateur_id = CompteUtilisateur::create($info_compte);

        DossierPrestataire::create(['compte_utilisateur_id' => $compte_utilisateur_id->id]);

        //Mail::to($request['email'])->send(new NotificationFormMail($info_compte));
        return redirect()->route('login');
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


        if ($compteUtilisateur->type_compte->id == 1) {
            $infoComplementaires = Individu::where('compte_utilisateur_id', $compteUtilisateur->id)->first();


            $dossierPrestataire = DossierPrestataire::with('individu')->where('individu_id', $infoComplementaires->id)->get();

            $communeVille = CommuneVille::where('pays_nationalite_id', $infoComplementaires->pays_nationalite_id)->first();

            $filenames = DocumentUpload::where('compte_utilisateur_id', $compteUtilisateur->id)->get();

            return view('prestataire.profile', compact('compteUtilisateur',
                'infoComplementaires', 'communeVille', 'dossierPrestataire', 'filenames'));
        } else if ($compteUtilisateur->type_compte->id == 2) {

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
