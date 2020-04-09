@extends('layouts.master')
@section('title','Sélection de 3 prestataires et génération du rapport d’analyse sommaire')
@section('content')
    <!-- Sélection des prestataires -->
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Sélection de 3 prestataires et génération du rapport d’analyse sommaire</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th>N°Enreg</th>
                                    <th>N° PRCCE</th>
                                    <th>Code départ.</th>
                                    <th>Civilité</th>
                                    <th>Sexe</th>
                                    <th>Nom</th>
                                    <th>Nom jeune fille</th>
                                    <th>Prénom</th>
                                    <th>Nationalité</th>
                                    <th>Maîtrise de langue</th>
                                    <th>Niveau d’accréditation</th>
                                    <th>Note moyenne générale des bénéficiaire</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($dossierPrestataires as $dossierPrestataire)
                                    <tr>
                                        <td>{{$dossierPrestataire->id}}</td>
                                        <td>{{$dossierPrestataire->identifiant_prcce}}</td>
                                        <td>{{$dossierPrestataire->departement->code}}</td>
                                        <td>{{$dossierPrestataire->compte_utilisateur->civilite->designation}}</td>
                                        <td>{{$dossierPrestataire->compte_utilisateur->genre_sexe->designation}}</td>
                                        <td>{{$dossierPrestataire->compte_utilisateur->nom}}</td>
                                        <td>{{$dossierPrestataire->individu->nom_jeune_fille}}</td>
                                        <td>{{$dossierPrestataire->compte_utilisateur->prenom}}</td>
                                        <td>{{$dossierPrestataire->individu->pays_nationalite->designation}}</td>
                                        @foreach($comptenceLinguistiques as $comptenceLinguistique)
                                            <td>{{$comptenceLinguistique->niveau_maitrise->designation.'->'.$comptenceLinguistique->langue->designation}}</td>
                                        @endforeach
                                        @foreach($dossierPrestataire->accreditations as $accreditation)
                                            <td>{{$accreditation->niveau_accreditation->designation}}</td>
                                        @endforeach
                                        <td>XXXXXXXXXX</td>
                                        <td>
                                            <a href=""
                                               class="btn btn-outline-danger btn-sm" title="Consulter"><i
                                                    class="fa fa-eye"></i></a>
                                            <a href="#" class="btn btn-outline-danger btn-sm" title="Supprimer"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12">
        <div class="x_panel collapsed">
            <div class="x_title">
                <h2>Recherche</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" method="POST"
                      action="">
                    @csrf
                    <strong> Recherche par mot-clé</strong>
                    <br>
                    <br>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Mot-clé
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" id="mot_cle" name="mot_cle" class="form-control"
                                   placeholder="rechercher">
                        </div>
                    </div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button class="btn btn-primary" type="reset">Effacer</button>
                            <button type="submit" class="btn btn-success">Rechercher</button>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <strong>Recherche avancée par critères de sélection</strong>
                    <br>
                    <br>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Type de prestation:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="type_prestation" id="type_prestation" class="form-control">
                                <option value="">Votre choix</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Famille
                            d‘intervention:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="famille_intervention" id="famille_intervention" class="form-control">
                                <option value="">Votre choix</option>
                                @foreach($familleInterventions as $familleIntervention)
                                    <option
                                        value="{{$familleIntervention->id}}">{{$familleIntervention->designation}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Sous-catégorie:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="sous_categorie" id="sous_categorie" class="form-control">
                                <option value="">Votre choix</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Année(s)
                            d‘expérience:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="annee_experience" name="annee_experience" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Département:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="departement" id="departement" class="form-control">
                                <option value="">Votre choix</option>
                                @foreach($departements as $departement)
                                    <option value="{{$departement->id}}">{{$departement->designation}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Degré de maîtrise de
                            langue:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="degre_maitrise_langue" id="degre_maitrise_langue" class="form-control">
                                <option value="">Votre choix</option>
                                @foreach($degreMaitriseLangues as $degreMaitriseLangue)
                                    <option
                                        value="{{$degreMaitriseLangue->id}}">{{$degreMaitriseLangue->designation}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Niveau
                            d’accréditation:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="niveau_accreditation" id="niveau_accreditation" class="form-control">
                                <option value="">Votre choix</option>
                                @foreach($niveauAccreditations as $niveauAccreditation)
                                    <option
                                        value="{{$niveauAccreditation->id}}">{{$niveauAccreditation->designation}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Note moyenne
                            générale:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="note_moyenne_generale" name="note_moyenne_generale"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Zone d'intervention:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="zone_intervention" id="zone_intervention" class="form-control">
                                <option value="">Votre choix</option>
                                @foreach($zoneInterventions as $zoneIntervention)
                                    <option
                                        value="{{$zoneIntervention->id}}">{{$zoneIntervention->designation}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Disponibilité:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="disponibilite" id="disponibilite" class="form-control">
                                <option value="">Votre choix</option>
                                @foreach($disponiblites as $disponiblite)
                                    <option value="{{$disponiblite->id}}">{{$disponiblite->designation}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nationalité:
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <select name="nationalite" id="nationalite" class="form-control">
                                <option value="">Votre choix</option>
                                @foreach($nationalites as $nationalite)
                                    <option value="{{$nationalite->id}}">{{$nationalite->designation}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nombre minimum de
                            références clients:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="nombre_min_ref_client" name="nombre_min_ref_client"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button class="btn btn-primary" type="reset">Effacer</button>
                            <button type="submit" class="btn btn-success">Rechercher</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12">
        <div class="x_panel collapsed">
            <div class="x_title">
                <h2> Soumission du rapport d’analyse sommaire de la demande au comité d’engagement (ON, DUE)</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <strong>Date de soumission de la demande</strong>
                <br>
                <br>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date de soumission:
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="date" id="date_soumission" name="date_soumission" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Prestataire 1:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-2">
                        <select name="prestataire1" id="prestataire1" class="form-control">
                            <option value="">Votre choix</option>
                            @foreach($dossierPrestataires as $dossierPrestataire)
                                <option
                                    value="{{$dossierPrestataire->id}}">{{$dossierPrestataire->identifiant_prcce}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-7 col-sm-7 checkbox">
                        <div class="checkbox">
                            <label class="col-form-label col-md-7 col-sm-7 label-align" for="last-name">Préférence du
                                bénéficiaire?
                                <input type="checkbox" value="oui" name="pref1">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Prestataire 2:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-2">
                        <select name="prestataire2" id="prestataire2" class="form-control">
                            <option value="">Votre choix</option>
                            @foreach($dossierPrestataires as $dossierPrestataire)
                                <option
                                    value="{{$dossierPrestataire->id}}">{{$dossierPrestataire->identifiant_prcce}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-7 col-sm-7 checkbox">
                        <div class="checkbox">
                            <label class="col-form-label col-md-7 col-sm-7 label-align" for="last-name">Préférence du
                                bénéficiaire?
                                <input type="checkbox" value="oui" name="pref2">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Prestataire 3:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-2">
                        <select name="prestataire3" id="prestataire3" class="form-control">
                            <option value="">Votre choix</option>
                            @foreach($dossierPrestataires as $dossierPrestataire)
                                <option
                                    value="{{$dossierPrestataire->id}}">{{$dossierPrestataire->identifiant_prcce}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-7 col-sm-7 checkbox">
                        <div class="checkbox">
                            <label class="col-form-label col-md-7 col-sm-7 label-align" for="last-name">Préférence du
                                bénéficiaire?
                                <input type="checkbox" value="oui" name="pref3">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Observation
                        Gestionnaire:
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <textarea class="form-control" cols="30" name="observations" rows="3"></textarea>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button class="btn btn-primary" type="reset">Effacer</button>
                        <button type="submit" class="btn btn-success">Enregistrer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12">
        <div class="x_panel collapsed">
            <div class="x_title">
                <h2>Documents joints</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">TDR validé par le
                        Gestionnaire, Rapport d’analyse sommaire:
                    </label>

                    <div class="col-md-6 col-sm-6 ">
                        <form method="POST" action="{{url('document/upload/store')}}" enctype="multipart/form-data"
                              class="dropzone dropzone fform-horizontal form-label-left" id="dropzone">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sélection des prestataires -->

    <!-- Circuit de validation du prestataire et de la demande par l’ON et la DUE -->
    <div class="col-md-12 col-sm-12">
        <div class="x_panel collapsed">
            <div class="x_title">
                <h2>Circuit de validation du prestataire et de la demande par l’ON et la DUE</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" method="POST"
                      action="">
                    @csrf
                    <strong>Visas</strong>
                    <br/>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Date du visa du
                            Gestionnaire
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_visa_gestionnaire" name="date_visa_gestionnaire"
                                   class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Visa de l'ONs :
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2">
                            <select name="visa_ons" id="visa_ons" class="form-control">
                                <option value="">Votre choix</option>
                            </select>
                        </div>
                        <label class="col-form-label col-md-2 col-sm-2 label-align" for="last-name">Date visa ONs :
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2">
                            <input type="date" name="date_visa_ons" id="date_visa_ons" required="required"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Visa de la DUE :
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2">
                            <select name="visa_due" id="visa_due" class="form-control">
                                <option value="">Votre choix</option>
                            </select>
                        </div>
                        <label class="col-form-label col-md-2 col-sm-2 label-align" for="last-name">Date visa DUE :
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2">
                            <input type="date" name="date_visa_due" id="date_visa_due" required="required"
                                   class="form-control">
                        </div>
                    </div>
                    <hr>
                    <strong>Choix et validation du prestataire</strong>
                    <br/>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date soumission des
                            prestataires:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_soumission_prestataire" name="date_soumission_prestataire"
                                   class="form-control"
                                   readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Prestataire retenu:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="prestataire_retenu" id="prestataire_retenu" class="form-control">
                                <option value="">Votre choix</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date de sélection et
                            d’approbation du prestataire par l’ON:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_selection_approbation_prestataire_on"
                                   name="date_selection_approbation_prestataire_on"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date de sélection et
                            d’approbation du prestataire par la DUE:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_selection_approbation_prestataire_due"
                                   name="date_selection_approbation_prestataire_due"
                                   class="form-control">
                        </div>
                    </div>
                    <hr>
                    <strong>Approbation des CV par le CE</strong>
                    <br/>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date de réception
                            des CV siège l’AT AGRER:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_reception_cv" name="date_reception_cv" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date d’approbation
                            des CV par l’ON:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_approbation_cv_on" name="date_approbation_cv_on"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date d’approbation
                            des CV par la DUE:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_approbation_cv_due" name="date_approbation_cv_due"
                                   class="form-control">
                        </div>
                    </div>
                    <hr>
                    <strong>Approbation des TDR par le CE</strong>
                    <br/>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date soumission des
                            TDR:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_soumission_trd" name="date_soumission_trd" class="form-control"
                                   readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date approbation des
                            TDR par l’ON:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_approbation_tdr_on" name="date_approbation_tdr_on"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date approbation des
                            TDR par la DUE:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_approbation_trd_due" name="date_approbation_trd_due"
                                   class="form-control">
                        </div>
                    </div>
                    <hr>
                    <strong>Validation de la demande</strong>
                    <br/>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date de soumission
                            de la demande:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_soumission_demande" name="date_soumission_demande"
                                   class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date de validation
                            de la demande par l’ON:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_validation_demande_on" name="date_validation_demande_on"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date de validation
                            de la demande par la DUE:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_validation_demande_due" name="date_validation_demande_due"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Observation du
                            Gestonnaire:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" cols="30" name="observations" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button class="btn btn-primary" type="reset">Effacer</button>
                            <button type="submit" class="btn btn-success">Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12">
        <div class="x_panel collapsed">
            <div class="x_title">
                <h2>Documents joints</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Documents joints (si
                        applicable):
                    </label>

                    <div class="col-md-6 col-sm-6 ">
                        <form method="POST" action="{{url('document/upload/store')}}" enctype="multipart/form-data"
                              class="dropzone dropzone fform-horizontal form-label-left" id="dropzone">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Circuit de validation du prestataire et de la demande par l’ON et la DUE  -->
@endsection

@push('stylesheets')

@endpush

@push('scripts')

@endpush

