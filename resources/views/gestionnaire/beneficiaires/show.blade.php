@extends('layouts.master')
@section('title','Information sur le bénéficiaire')
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
                               value="{{$dossierBeneficiaire->identifiant_prcce}}"
                               class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Dénomination ou
                        raison sociale
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="raison_sociale" name="raison_sociale" class="form-control"
                               value="{{$dossierBeneficiaire->denomination_raison_sociale}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Sigle ou abéviation
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="abreviation" name="abreviation" class="form-control"
                               value="{{$dossierBeneficiaire->sigle_abbreviation}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nom
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="nom" value="{{$dossierBeneficiaire->nom}}" readonly
                               class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Prénom: <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="prenom" value="{{$dossierBeneficiaire->prenom}}" readonly
                               class="form-control ">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">RCCM:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="rccm" required="required" class="form-control "
                               value="{{$dossierBeneficiaire->rccm}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">NIU:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="niu" required="required" class="form-control"
                               value="{{$dossierBeneficiaire->niu}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">SCIEN:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="scien" required="required" class="form-control"
                               value="{{$dossierBeneficiaire->scien}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">SCIET:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="sciet" required="required" class="form-control"
                               value="{{$dossierBeneficiaire->sciet}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Numéro de la
                        patente:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="numero_patente" required="required" class="form-control"
                               value="{{$dossierBeneficiaire->numero_patente}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">NSS:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="nss" required="required" class="form-control"
                               value="{{$dossierBeneficiaire->nss}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Autre identifiant
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="autre_identifiant" required="required" class="form-control"
                               value="{{$dossierBeneficiaire->autre_identifiant}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Secteur juridique:
                        <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="secteur_juridique" required="required" class="form-control"
                               value="{{$dossierBeneficiaire->secteur_juridique->designation}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Activité principale:
                        <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="activite_principale" required="required" class="form-control"
                               value="{{$dossierBeneficiaire->activite_principale->designation}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Activité(s)
                        secondaire(s): <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="activite_secondaire" required="required" class="form-control"
                               value="{{$dossierBeneficiaire->activite_secondaire}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date de création:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="date" name="date_creation" id="date_creation" required="required"
                               class="form-control" value="{{$dossierBeneficiaire->date_creation}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Montant du capitale
                        sociale
                        : <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="montant_capitale_sociale" id="montant_capitale_sociale"
                               value="{{$dossierBeneficiaire->montant_capitale_sociale}}" readonly
                               class="form-control ">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Chiffre d'affaire
                        : <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="chiffre_affaire" id="chiffre_affaire"
                               value="{{$dossierBeneficiaire->chiffre_affaire}}" readonly
                               class="form-control ">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Nom et prénom du gérant
                        : <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="nom_prenom_gerant" id="nom_prenom_gerant"
                               value="{{$dossierBeneficiaire->gerant_responsable}}" readonly
                               class="form-control ">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Présentation
                        générale: <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <textarea class="form-control" cols="30" name="presentation_generale" rows="3"
                                  readonly>{{$dossierBeneficiaire->motivations}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Effectif (nombre employés)
                        : <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="number" name="nombre_employes" id="nombre_employes"
                               value="{{$dossierBeneficiaire->nombre_employes}}" readonly
                               class="form-control ">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Situation structure:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="situation_structure" id="situation_structure"
                               value="{{$dossierBeneficiaire->situation_structure->designation}}" readonly
                               class="form-control ">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Structure mère
                        : <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="structure_mere" id="structure_mere"
                               class="form-control" value="{{$dossierBeneficiaire->structure_mere}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Filiale d'une
                        multinationale: <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="structure_mere" id="structure_mere"
                               class="form-control" value="{{$dossierBeneficiaire->filiale_multinationale}}" readonly>

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Adresse:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="adresse" id="adresse" value="{{$dossierBeneficiaire->adresse}}"
                               readonly
                               class="form-control ">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Pays: <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="pays" id="pays"
                               value="{{$dossierBeneficiaire->pays_nationalite->designation}}" readonly
                               class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Ville ou commune
                        (CG): <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="ville" id="pays"
                               value="{{$dossierBeneficiaire->commune_ville->designation}}" readonly
                               class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Département (CG):
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="departement" id="departement"
                               value="{{$dossierBeneficiaire->departement->designation}}" readonly
                               class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Arrondissement (CG):
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="arrondissement" id="arrondissement"
                               value="{{$dossierBeneficiaire->arrondissement->designation}}" readonly
                               class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Quartier (CG): <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="quartier" id="quartier"
                               value="{{$dossierBeneficiaire->quartier->designation}}" readonly
                               class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">N° de téléphone:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="telephone" id="telephone" value="{{$dossierBeneficiaire->telephone}}"
                               readonly
                               class="form-control ">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Fax:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="fax" id="fax" class="form-control"
                               value="{{$dossierBeneficiaire->fax}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">E-mail:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="email" id="email" value="{{$dossierBeneficiaire->email}}" readonly
                               class="form-control ">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Site web:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="site_web" id="site_web" value="{{$dossierBeneficiaire->site_web}}"
                               readonly
                               class="form-control ">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Réseaux sociaux:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="reseaux_sociaux" id="reseaux_sociaux"
                               value="{{$dossierBeneficiaire->reseaux_sociaux}}" readonly
                               class="form-control ">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Qu'est ce qui vous
                        motive à intégrer le dispositif Cluster PME dans le cadre du PRCCEII ?: <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <textarea class="form-control" cols="30" name="motivations" rows="3"
                                  readonly>{{$dossierBeneficiaire->motivations}} </textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /sous formulaire identité-->

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
    @if( $decisionEligibiliteBeneficiaire->avis_decision_id === 2 or $decisionEligibiliteBeneficiaire->avis_decision_id === 3)
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Eligibilité du bénéficiaire</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form id="demo-form"
                          action="{{route('gestionnaire.beneficiaire.eligibilite', $dossierBeneficiaire->id)}}"
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

