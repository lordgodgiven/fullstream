@extends('layouts.master')
@section('title','Création cluster')
@section('content')
    <!-- Gestion des clusters -->
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2> Gestion des clusters </h2>
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
                                    <th>N° Enreg.</th>
                                    <th>Identificant PRCCE</th>
                                    <th>Identifiant / N° d’enregistrement</th>
                                    <th>Nom du cluster</th>
                                    <th>Chaîne de valeur</th>
                                    <th>Ville</th>
                                    <th>Département</th>
                                    <th>Structure responsable du cluster</th>
                                    <th>Date creation (AGC)</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($clusters as $cluster)
                                    <tr>
                                        <td>{{$cluster->dossier_beneficiaire_id}}</td>
                                        <td>{{$cluster->identificiant_prcce}}</td>
                                        <td>{{$cluster->numero_enregistrement}}</td>
                                        <td>{{$cluster->nom_cluster}}</td>
                                        <td>{{$cluster->chaine_valeur->designation}}</td>
                                        <td>{{$cluster->commune_ville->designation}}</td>
                                        <td>{{$cluster->departement->designation}}</td>
                                        <td>{{$cluster->structure_responsable}}</td>
                                        <td>{{$cluster->date_creation}}</td>
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
    <!-- Gestion des clusters-->

    <!-- Identité -->
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel collapsed">
            <div class="x_title">
                <h2> Identité</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" method="POST"
                      action="{{route('gestionnaire-cluster.store')}}">
                    @csrf
                    <input type="hidden" id="secretaire_id" name="secretaire_id"/>
                    <input type="hidden" id="president_id" name="president_id"/>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Identifiant PRCCEII
                            :
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="identifiant_prcce" name="identifiant_prcce" class="form-control"
                                   readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Identifiant / N°
                            d’enregistrement (Agrément, …) :
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="numero_enregistrement" name="numero_enregistrement"
                                   class="form-control"
                                   required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nom du cluster
                            <span class="required">*</span>:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="nom_cluster" name="nom_cluster" class="form-control"
                                   required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Chaîne de valeur :

                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="chaine_valeur" id="chaine_valeur" class="form-control">
                                <option value="">Votre choix</option>
                                @foreach($chaineValeurs as $chaineValeur)
                                    <option value="{{$chaineValeur->id}}"
                                            @if(old('chaine_valeur')==$chaineValeur->id) selected="selected" @endif>{{$chaineValeur->designation}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Ville: <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="ville" id="ville" class="form-control">
                                <option value="">Votre choix</option>
                                @foreach($villes as $ville)
                                    <option value="{{$ville->id}}"
                                            @if(old('ville')==$ville->id) selected="selected" @endif>{{$ville->designation}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Département :
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="departement" id="departement" class="form-control">
                                <option value="">Votre choix</option>
                                @foreach($departements as $departement)
                                    <option value="{{$departement->id}}"
                                            @if(old('departement')==$departement->id) selected="selected" @endif>{{$departement->designation}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Structure
                            responsable du cluster:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="structure_responsable_cluster" class="form-control"
                                   id="structure_responsable_cluster">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date creation (AGC):
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" name="date_creation" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Auteur :
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="auteur_cluster" required="required" class="form-control ">
                        </div>
                    </div>
                    <hr>
                    Président
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nom:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 form-label-left">
                            <input type="text" name="nom_president" id="nom_president" required="required"
                                   class="form-control">
                            <span class="fa fa-user-circle-o form-control-feedback right" aria-hidden="true"
                                  title="liste des beneficiaires"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Prénom:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="prenom_president" id="prenom_president" required="required"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">N° Téléphone 1:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="numero_telephone_president1" id="numero_telephone_president1"
                                   required="required" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">N° Téléphone 2:
                            <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="numero_telephone_president2" id="numero_telephone_president2"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">N° Fax:
                            <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="numero_fax_president" id="numero_fax_president" required="required"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-email">E-mail: <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="email" name="email_president" id="email_president" required="required"
                                   class="form-control">
                        </div>
                    </div>
                    <hr>
                    Secrétaire
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nom
                            : <span class="required">*</span>
                        </label>

                        <div class="col-md-6 col-sm-6 form-label-left">
                            <input type="text" name="nom_secretaire" id="nom_secretaire" required="required"
                                   class="form-control ">
                            <span class="fa fa-user-plus form-control-feedback right" aria-hidden="true"
                                  title="liste des beneficiaires"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Prénom
                            : <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="prenom_secretaire" id="prenom_secretaire" required="required"
                                   class="form-control ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">N° Téléphone
                            : <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="numero_telephone_secretaire" id="numero_telephone_secretaire"
                                   required="required"
                                   class="form-control ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">E-mail
                            : <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="email_secretaire" id="email_secretaire" required="required"
                                   class="form-control ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Commentaire du
                            gestionnaire
                            : <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" cols="30" name="commentaire_gestionnaire"
                                      rows="3"></textarea>
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
                <h2>Identité pièces jointes</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Pièces jointes (si
                        applicable):
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <form method="POST" action="{{url('document/upload/store')}}" enctype="multipart/form-data"
                              class="dropzone dropzone form-horizontal form-label-left" id="dropzone">
                            @csrf
                            <input type="hidden" name="identite" value="identite">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Identité-->

    <!-- Membres du cluster -->
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel collapsed">
            <div class="x_title">
                <h2>Membres du cluster</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                                    <th>N° Enreg.</th>
                                    <th>Nom du clusteur</th>
                                    <th>Chaîne de valeur</th>
                                    <th>Structure membre</th>
                                    <th>Rôle</th>
                                    <th>Date d’inscription</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href=""
                                           class="btn btn-outline-danger btn-sm" title="Consulter"><i
                                                class="fa fa-eye"></i></a>
                                        <a href="#" class="btn btn-outline-danger btn-sm" title="Supprimer"><i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <form class="form-horizontal form-label-left" method="POST"
                      action="{{route('gestionnaire-cluster-adhresion.store')}}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nom du cluster
                            :
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="liste_nom_cluster" id="liste_nom_cluster" class="form-control">
                                <option value="" selected>Votre choix</option>
                                @foreach($clusters as $cluster)
                                    <option value="{{$cluster->dossier_beneficiaire_id}}"
                                            @if(old('nom_cluster')==$cluster->id) selected="selected" @endif>{{$cluster->nom_cluster}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Chaine de valeur:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="hidden" name="chaine_valeur_id" id="chaine_valeur_id">
                            <input type="text" id="nom_chaine_valeur" name="chaine_valeur" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Structure
                            Bénéficiaire:
                            <span class="required">*</span>:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="structure_beneficiaire" id="structure_beneficiaire" class="form-control">
                                <option value="">Votre choix</option>
                                @foreach($structureBeneficiaires as $structureBeneficiaire)
                                    <option value="{{$structureBeneficiaire->id}}"
                                            @if(old('structure_beneficiaire')==$structureBeneficiaire->id) selected="selected" @endif>{{$structureBeneficiaire->denomination_raison_sociale}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Rôle* :

                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="role_membre_cluster" id="role_membre_cluster" class="form-control">
                                <option value="">Votre choix</option>
                                @foreach($roleMembreClusters as $roleMembreCluster)
                                    <option value="{{$roleMembreCluster->id}}"
                                            @if(old('role_membre_cluster')==$roleMembreCluster->id) selected="selected" @endif>{{$roleMembreCluster->designation}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date d'entrée: <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_entree" name="date_entree" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date de sortie :
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_sortie" name="date_sortie" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Motif de sortie:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="motif_sortie" id="motif_sortie" class="form-control">
                                <option value="">Votre choix</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Commentaire:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" cols="30" name="commentaire_gestionnaire"
                                      rows="3"></textarea>
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
    <!-- Membres du cluster-->
    <!-- Modal Sécretaires-->
    <div class="modal fade" id="listeBeneficiaireSecretaires" tabindex="-1" role="dialog"
         aria-labelledby="listeBeneficiaireSecretaires"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Liste des bénéficiaires <img src="{{asset('images/hourglass.gif')}}"
                                                                         id="label_loading_liste_beneficiaire_secretaire"
                                                                         height="10%" width="25%"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="liste_beneficiaire_secretaire" id="label_choix_secretaire">Choix de la
                            sécrétaire</label>
                        <div class="text-center">
                            <img src="{{asset('images/hourglass.gif')}}" id="loading_liste_beneficiaire_secretaire"
                                 height="25%" width="25%">
                        </div>
                        <select multiple class="form-control" id="liste_beneficiaire_secretaire"
                                name="liste_beneficiaire_secretaire">
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Sécretaires-->

    <!-- Modal Présidents-->
    <div class="modal fade" id="listeBeneficiairePresidents" tabindex="-1" role="dialog"
         aria-labelledby="listeBeneficiairePresidents"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Liste des bénéficiaires <img src="{{asset('images/hourglass.gif')}}"
                                                                         id="label_loading_liste_beneficiaire_president"
                                                                         height="10%" width="25%"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="liste_beneficiaire_president" id="label_choix_president">Choix du président</label>
                        <div class="text-center">
                            <img src="{{asset('images/hourglass.gif')}}" id="loading_liste_beneficiaire_president"
                                 height="25%" width="25%">
                        </div>
                        <select multiple class="form-control" id="liste_beneficiaire_president"
                                name="liste_beneficiaire_president">
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Présidents-->
@endsection

@push('stylesheets')

@endpush

@push('scripts')
    <script src="{{asset('js/liste_beneficiaire_secretaires.js')}}"></script>
    <script src="{{asset('js/liste_beneficiaire_presidents.js')}}"></script>
    <script src="{{asset('js/chainevaleur_loader.js')}}"></script>
@endpush
