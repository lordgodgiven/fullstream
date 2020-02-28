<?php

namespace App\Http\Controllers;

use App\Models\Civilite;
use App\Models\CommuneVille;
use App\Models\CompetenceLinExpert;
use App\Models\CompteUtilisateur;
use App\Models\Departement;
use App\Models\Disponibilite;
use App\Models\DossierPrestataire;
use App\Models\Employeur;
use App\Models\ExperienceChaineValeurExpert;
use App\Models\FamilleIntervention;
use App\Models\GenreSexe;
use App\Models\Individu;
use App\Models\Langue;
use App\Models\NiveauMaitrise;
use App\Models\NiveauQualification;
use App\Models\PaysNationalite;
use App\Models\ReferenceClientExpert;
use App\Models\SituationFamilliale;
use App\Models\SousCategorie;
use App\Models\TypeEmployeur;
use App\Models\TypeExpert;
use App\Models\TypePrestationDispensee;
use App\Models\ZoneIntervention;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DossierPrestataireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('prestataire.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $compte_utilisateur_id = Auth::user()->id;

        $utilisateur = CompteUtilisateur::find(Auth::user()->id);

        $dossier_prestataire = DossierPrestataire::where('compte_utilisateur_id', $compte_utilisateur_id)->first();

        $competenceLinguistiqueExperts = CompetenceLinExpert::with(['langue', 'niveau_maitrise'])
            ->where('dossier_prestataire_id', $dossier_prestataire->id)->get();

        $typePrestationRetenues = TypePrestationDispensee::with(['famille_intervention', 'sous_categorie'])
            ->where('dossier_prestataire_id', $dossier_prestataire->id)->get();

        $experienceChaineValeurExperts = ExperienceChaineValeurExpert::with(['famille_intervention', 'sous_categorie'])
            ->where('dossier_prestataire_id', $dossier_prestataire->id)->get();

        $referenceClients = ReferenceClientExpert::with(['dossier_prestataire'])
            ->where('dossier_prestataire_id', $dossier_prestataire->id)->get();


        $identifiant_prcce = $this->prcce_identifiant_generator();
        $nationalites = PaysNationalite::all();
        $listePays = PaysNationalite::all();
        $departements = Departement::all();
        $disponibilites = Disponibilite::all();
        $zoneInterventions = ZoneIntervention::all();
        $villes = CommuneVille::all();
        $email = CompteUtilisateur::find(Auth::user()->id);
        //$individu = Individu::where('compte_utilisateur_id', (Auth::user()->id))->first();

        $typeExperts = TypeExpert::all();
        $familleInterventions = FamilleIntervention::all();
        $employeurs = Employeur::with('type_employeur')->where('dossier_prestataire_id', $dossier_prestataire->id)->get();

        $sousCategories = SousCategorie::all();
        $typeEmployeurs = TypeEmployeur::all();
        $langues = Langue::all();
        $niveauMaitrises = NiveauMaitrise::all();

        $typePrestationDispensees = TypePrestationDispensee::all();
        $civilites = Civilite::all();
        $genreSexes = GenreSexe::all();
        $niveauQualifications = NiveauQualification::all();
        $situationFamilliales = SituationFamilliale::all();

        return view('prestataire.create', compact('departements',
            'disponibilites', 'listePays', 'zoneInterventions',
            'nationalites', 'villes', 'email', 'typeExperts',
            'familleInterventions', 'sousCategories', 'typeEmployeurs',
            'langues', 'niveauMaitrises', 'typePrestationDispensees', 'civilites',
            'genreSexes', 'niveauQualifications', 'dossier_prestataire',
            'situationFamilliales', 'individu', 'referenceClients',
            'employeurs', 'competenceLinguistiqueExperts', 'identifiant_prcce',
            'typePrestationRetenues', 'experienceChaineValeurExperts', 'utilisateur'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $telephone = $request->indicatif_telephonique . ' ' . $request->numero_telephone;
        $motivation = $request['motivations'];
        $compte_utilisateur_id = CompteUtilisateur::find(Auth::user()->id);
        $dossier_prestataire = DossierPrestataire::where('compte_utilisateur_id', $compte_utilisateur_id->id)->first();


        if (is_null($motivation)) {

            Individu::where('id', $dossier_prestataire->individu_id)
                ->update([
                    'identifiant_prcce' => $request->identifiant_prcce,
                    'pays_nationalite_id' => $request->nationalite,
                    'niu' => $request->niu,
                    'nss' => $request->nss,
                    'niveau_qualification_id' => $request->niveau_qualification,
                    'date_naissance' => $request->date_naissance,
                    'nom_jeune_fille' => $request->nom_jeune_fille,
                    'situation_familliale_id' => $request->situation_familliale,
                    'adresse_personnelle' => $request->adresse_personnelle,
                ]);

            DossierPrestataire::where('compte_utilisateur_id', $compte_utilisateur_id->id)
                ->update([
                    'compte_utilisateur_id' => $compte_utilisateur_id->id,
                    'identifiant_prcce' => $request->identifiant_prcce,
                    'telephone' => $telephone,
                    'disponibilite_id' => $request->disponibilite,
                    'famille_intervention_id' => $request->famille_intervention_id,
                    'zone_intervention_id' => $request->zone_intervention,
                    'type_expert_id' => $request->type_expert,
                    'departement_id' => $request->departement,
                    'commune_ville_id' => $request->ville,
                    'situation_familliale_id' => $request->situation_familliale,
                    //'situation_a_i_id' => $request->situation_dossier,
                ]);

            $notification = array(
                'message' => 'Votre dossier a été crée avec succès!',
                'alert-type' => 'success'
            );

            return redirect()->route('dossier-prestataire.create')->with($notification);
        } else {
            DossierPrestataire::where('compte_utilisateur_id', $compte_utilisateur_id->id)
                ->update([

                    'motivation' => $request->motivations,
                ]);

            $notification = array(
                'message' => 'Votre dossier a été mis à jour avec succès!',
                'alert-type' => 'info'
            );

            return redirect()->route('dossier-prestataire.create')->with($notification);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\DossierPrestataire $dossierPrestataire
     * @return \Illuminate\Http\Response
     */
    public function show(DossierPrestataire $dossierPrestataire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\DossierPrestataire $dossierPrestataire
     * @return \Illuminate\Http\Response
     */
    public function edit(DossierPrestataire $dossierPrestataire)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DossierPrestataire $dossierPrestataire
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {

        $notification = array(
            'message' => 'Votre dossier a été soumis avec succès!',
            'alert-type' => 'info'
        );

        DossierPrestataire::with('compte_utilisateur')
            ->where('compte_utilisateur_id', $id)
            ->update(['soumission_dossier_ok' => "OUI"]);

        return redirect()->route('profile.show', $id)->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\DossierPrestataire $dossierPrestataire
     * @return \Illuminate\Http\Response
     */
    public function destroy(DossierPrestataire $dossierPrestataire)
    {
        //
    }

    private function prcce_identifiant_generator()
    {
        return $nui = strtoupper("prcce-" . substr(base_convert(sha1(uniqid(mt_rand(), true)), 16, 36), 0, 6));
    }
}
