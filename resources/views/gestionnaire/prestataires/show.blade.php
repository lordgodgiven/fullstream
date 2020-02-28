@extends('layouts.master')
@section('title','Information sur le prestataire')
@section('content')
    <!-- sous formulaire identitté -->
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Identité</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Identifiant PRCCEII
                        :
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="identifiant_prcce" name="identifiant_prcce"
                               value="{{$dossierPrestataire->identifiant_prcce}}"
                               class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">NSS
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="nss" name="nss" value="{{$dossierPrestataire->individu->nss ?? ''}}"
                               class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Numéro
                        d'identification Unique(NIU) <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="niu" class="form-control"
                               value="{{$dossierPrestataire->individu->niu ?? ''}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nom: <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="nom" class="form-control"
                               value="{{$dossierPrestataire->individu->nom ?? ''}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nom de jeune fille:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="nom_jeune_fille" required="required" class="form-control"
                               value="{{$dossierPrestataire->individu->nom_jeune_fille ?? ''}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Prénom: <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="prenom" class="form-control"
                               value="{{$dossierPrestataire->individu->prenom ?? ''}}"
                               readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nationalité:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="nationalite" class="form-control"
                               value="{{$dossierPrestataire->individu->pays_nationalite->designation ?? ''}}"
                               readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Adresse personnelle:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="adresse_personnelle" id="adresse_personnelle"
                               value="{{$dossierPrestataire->individu->adresse_personnelle ?? ''}}"
                               class="form-control" readonly>
                    </div>

                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Pays de résidence
                        actuelle: <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="nationalite" class="form-control"
                               value="{{$dossierPrestataire->individu->pays_nationalite->designation ?? ''}}"
                               readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Département de
                        résidence actuelle: <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="nationalite" class="form-control"
                               value="{{$dossierPrestataire->departement->designation ?? ''}}"
                               readonly>

                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Ville: <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="ville" class="form-control"
                               value="{{$dossierPrestataire->commune_ville->designation ?? ''}}"
                               readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">E-mail:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="email" id="email" required="required"
                               value="{{$dossierPrestataire->compte_utilisateur->email ?? ''}}"
                               class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Numéro de téléphone:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-2">
                        <input type="text" name="telephone" id="telephonee"
                               value="{{$dossierPrestataire->telephone ?? ''}}"
                               class="form-control" readonly>
                    </div>

                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date de naissance:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="date_naissance" id="date_naissance"
                               class="form-control " value="{{$dossierPrestataire->individu->date_naissance ?? ''}}"
                               readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Disponibilité: <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="date_naissance" id="date_naissance"
                               class="form-control " value="{{$dossierPrestataire->disponibilite->designation ?? ''}}"
                               readonly>

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Zone d'intervention:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="zone_intervention" id="zone_intervention"
                               class="form-control "
                               value="{{$dossierPrestataire->zone_intervention->designation ?? ''}}" readonly>

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Type expert: <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="type_expert" id="type_expert"
                               class="form-control " value="{{ $dossierPrestataire->type_expert->designation ?? ''}}"
                               readonly>

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nivau de
                        qualification: <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="niveau_qualification" id="niveau_qualification"
                               class="form-control "
                               value="{{$dossierPrestataire->individu->niveau_qualification->designation ?? ''}}"
                               readonly>

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Situation
                        familliale: <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="situation_familliale" id="date_naissance"
                               class="form-control "
                               value="{{ $dossierPrestataire->situation_familliale->designation ?? ''}}" readonly>

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Situation du
                        dossier:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="situation_dossier" id="situation_dossier"
                               class="form-control " value="{{$dossierPrestataire->situation_dossier ?? ''}}" readonly>
                    </div>
                </div>
                <div class="ln_solid"></div>

            </div>
        </div>
    </div>
    <!-- /sous formulaire identité-->

    <!-- Types de prestations dispensées (Chaîne de valeur) -->
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Types de prestations dispensées (Chaîne de valeur)</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Famille d'interevention</th>
                        <th>Sous-catégorie</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($typePrestationDispensees as $typePrestationDispensee)
                        <tr>
                            <td>{{$typePrestationDispensee->famille_intervention->designation}}</td>
                            <td>{{$typePrestationDispensee->sous_categorie->designation}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="ln_solid"></div>
            </div>
        </div>
    </div>
    <!-- /Types de prestations dispensées (Chaîne de valeur) -->

    <!-- Employeur(s) actuel(s) (si applicable) -->
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <form class="form-horizontal form-label-left" method="POST" action="{{route('employeur.store')}}">
                @csrf
                <div class="x_title">
                    <h2>Employeur(s) actuel(s) (si applicable)</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Nom employeur</th>
                            <th>Type employeur</th>
                            <th>Pays</th>
                            <th>Années d'ancienneté</th>
                            <th>Missions principales</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employeurs as $employeur)
                            <tr>
                                <td>{{$employeur->nom}}</td>
                                <td>{{$employeur->type_employeur->designation}}</td>
                                <td>{{$employeur->pays_nationalite->designation}}</td>
                                <td>{{$employeur->anciennete}}</td>
                                <td>{{$employeur->missions_principales}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="ln_solid"></div>
                </div>
            </form>
        </div>
    </div>
    <!-- /Employeur(s) actuel(s) (si applicable) -->

    <!-- Maîtrise des langues (Compétences linguistiques) -->
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Maîtrise des langues (Compétences linguistiques)</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Langue</th>
                        <th>Dégré de maîtres</th>
                        <th>Code dégré de maîtrise</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($competenceLinguistiqueExperts as $competenceLinguistiqueExpert)
                        <tr>
                            <td>{{$competenceLinguistiqueExpert->langue->designation}}</td>
                            <td>{{$competenceLinguistiqueExpert->niveau_maitrise->designation}}</td>
                            <td>{{$competenceLinguistiqueExpert->code_degre_maitrise}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="ln_solid"></div>
            </div>
        </div>
    </div>
    <!-- /Maîtrise des langues (Compétences linguistiques) -->

    <!-- Expériences (tableau types d'expériences pour chaque famille d'intervention avec au moins une année d'expérience) -->
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Expériences (tableau types d'expériences pour chaque famille d'intervention avec au moins une
                    année
                    d'expérience)</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Famille d'intervention</th>
                        <th>Sous-catégorie</th>
                        <th>Année d'expérience</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($experienceChaineValeurExperts as $experienceChaineValeurExpert)
                        <tr>
                            <td>{{$experienceChaineValeurExpert->famille_intervention->designation}}</td>
                            <td>{{$experienceChaineValeurExpert->sous_categorie->designation}}</td>
                            <td>{{$experienceChaineValeurExpert->annees_experience}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="ln_solid"></div>
            </div>

        </div>
    </div>
    <!-- /Expériences (tableau types d'expériences pour chaque famille d'intervention avec au moins une année d'expérience) -->

    <!-- Références clients -->
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Références clients</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Client</th>
                        <th>Téléphone</th>
                        <th>E-mail</th>
                        <th>Type de prestation</th>
                        <th>Durée la prestation (H/J)</th>
                        <th class="text-center" colspan="2">Période de la préstation</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($referenceClients as $referenceClient)
                        <tr>
                            <td>{{$referenceClient->nom}}</td>
                            <td>{{$referenceClient->telephone}}</td>
                            <td>{{$referenceClient->email}}</td>
                            <td>{{$referenceClient->type_prestation}}</td>
                            <td>{{$referenceClient->duree}}</td>
                            <td>{{$referenceClient->date_debut}}</td>
                            <td>{{$referenceClient->date_fin}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="ln_solid"></div>
            </div>
        </div>
    </div>
    </div></div>
    <!-- Références clients -->

    <!-- Motivations -->
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Motivations</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Motivation: <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <textarea class="form-control" cols="30" name="motivations" rows="3"
                                  readonly>{{$dossierPrestataire->motivation}}</textarea>

                    </div>
                </div>

                <div class="ln_solid"></div>


            </div>

        </div>
    </div>
    <!-- /Motivations -->

    <!-- Documents fournis -->
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Documents fournis</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="data table table-striped no-margin">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom du document</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($filenames as $filename)
                        <tr>
                            <td>{{$filename->id}}</td>
                            <td><a href="/documents/{{$filename->filename}}"
                                   target="_blank"><i
                                        class="fa fa-paperclip"></i> {{$filename->filename}}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Documents fournis -->

    <!-- Eligibilite -->
    @if( $decisionEligibilitePrestataire->avis_decision_id === 2 or $decisionEligibilitePrestataire->avis_decision_id === 3)
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Eligibilité du prestataire</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form id="demo-form" action="{{route('gestionnaire.prestataire.eligibilite', $dossierPrestataire->id)}}"
                      method="POST" data-parsley-validate>
                    @csrf

                    <label>Etat dossier (complet, incomplet)* :</label>
                    <p>
                        Complet:
                        <input type="radio" class="flat" name="etat_dossier" id="complet" value="complet" required/>
                        Incomplet:
                        <input type="radio" class="flat" name="etat_dossier" id="incomplet" checked=""
                               value="incomplet"/>
                    </p>


                    <label for="message">Observation du gestionnaire :</label>
                    <textarea id="message" required="required" class="form-control" name="observation"
                              data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100"
                              data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                              data-parsley-validation-threshold="10"></textarea>
                    <br/>
                    <div class="col-md-3 col-sm-3 ">

                    </div>
                    <br/>
                    <label for="heard">Décision (Eligible, Non éligible):</label>
                    <select id="avis_decision" name="avis_decision" class="form-control" required>
                        <option value="">Votre choix</option>
                        @foreach($avisDecisions as $avisDecision)
                            <option value="{{$avisDecision->id}}">{{$avisDecision->designation}}</option>
                        @endforeach
                    </select>

                    <br/>
                    <button class="btn btn-primary" type="submit">Enregistrer</button>

                </form>

            </div>
        </div>
    </div>
    @endif
    <!-- Eligibilite-->

@endsection

@push('stylesheets')

@endpush

@push('scripts')

@endpush
