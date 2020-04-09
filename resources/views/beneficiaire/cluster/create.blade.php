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
                      action="{{route('cluster-beneficiaire.store')}}">
                    @csrf
                    <input type="hidden" id="secretaire_id" name="secretaire_id"/>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Identifiant PRCCEII
                            :
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="identifiant_prcce" name="identifiant_prcce"
                                   value="{{$dossierBeneficiaire->identifiant_prcce ?? ''}}"
                                   class="form-control" readonly>
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
                            <input type="text" name="structure_responsable_cluster" class="form-control "
                                   value="{{$dossierBeneficiaire->nom.' '.$dossierBeneficiaire->prenom}}" readonly>
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
                            <input type="text" name="auteur_cluster" required="required" class="form-control"
                                   value="{{ Auth::user()->nom.' '.Auth::user()->prenom }}" readonly>
                        </div>
                    </div>
                    <hr>
                    Président
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nom:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6">
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
                                   required="required"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">N° Téléphone 2:
                            <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="numero_telephone_president2" id="numero_telephone_president2"
                                   required="required"
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
                <hr>
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
                                @foreach($membreClusters as $membreCluster)
                                    <tr>
                                        <td>{{$membreCluster->id}}</td>
                                        <td>{{$membreCluster->nom_cluster}}</td>
                                        <td>{{$membreCluster->chaine_valeur}}</td>
                                        <td>{{$membreCluster->structure_membre}}</td>
                                        <td>{{$membreCluster->role}}</td>
                                        <td>{{$membreCluster->date_entree}}</td>
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
                <form class="form-horizontal form-label-left" method="POST"
                      action="{{route('adhesion-cluster.store')}}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Nom du cluster<span
                                class="required">*</span>:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="nom_cluster" name="nom_cluster" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Chaine de valeur:
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
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Structure
                            Bénéficiaire
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
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Rôle<span
                                class="required">*</span>:
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
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Date d'entrée <span
                                class="required">*</span>:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_entree" name="date_entree" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date de sortie<span
                                class="required">*</span>:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_sortie" name="date_sortie" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Motif de sortie<span
                                class="required">*</span>:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="motif_sortie" id="motif_sortie" class="form-control">
                                <option value="">Votre choix</option>
                                @foreach($motifs as $motif)
                                    <option value="{{$motif->id}}"
                                            @if(old('motif_sortie')==$motif->id) selected="selected" @endif>{{$motif->designation}}</option>
                                @endforeach
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

    <!-- Gestion des Assemblées Générales -->
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel collapsed">
            <div class="x_title">
                <h2>Gestion des Assemblées Générales</h2>
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
                                    <th>N°</th>
                                    <th>Date</th>
                                    <th>Lieu</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($assembleeGenerales as $assembleeGenerale)
                                    <tr>
                                        <td>{{$assembleeGenerale->id}}</td>
                                        <td>{{$assembleeGenerale->date}}</td>
                                        <td>{{$assembleeGenerale->lieu}}</td>
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
                <form class="form-horizontal form-label-left" method="POST"
                      action="{{route('assemblee-generale.store')}}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Date<span
                                class="required">*</span>:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date" name="date" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Lieu<span
                                class="required">*</span>:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="lieu" name="lieu" class="form-control">
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
                <hr>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Pièces jointes:
                    </label>

                    <div class="col-md-6 col-sm-6 ">
                        <form method="POST" action="{{url('document/upload/store')}}" enctype="multipart/form-data"
                              class="dropzone dropzone fform-horizontal form-label-left" id="dropzone">
                            @csrf
                            <input type="hidden" name="assemblee_generale" value="assemblee_generale">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gestion des Assemblées Générales-->

    <!--  Projets clusters -->
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel collapsed">
            <div class="x_title">
                <h2>Projets clusters</h2>
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
                                    <th>N°</th>
                                    <th>Cluster</th>
                                    <th>Chaine de valeur</th>
                                    <th>Nom / Intitulé</th>
                                    <th>Objectifs</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($projetClusters as $projetCluster)
                                    <tr>
                                        <td>{{$projetCluster->id}}</td>
                                        <td>{{$projetCluster->nom_cluster}}</td>
                                        <td>{{$cluster->chaine_valeur->designation}}</td>
                                        <td>{{$projetCluster->intitule_projet_cluster}}</td>
                                        <td>{{$projetCluster->objectifs}}</td>
                                        <td>{{$projetCluster->statut_projet->designation}}</td>
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
                <form class="form-horizontal form-label-left" method="POST"
                      action="{{route('projet-cluster.store')}}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nom du cluster<span
                                class="required">*</span>:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="nom_cluster" name="nom_cluster"
                                   value="{{$cluster->nom_cluster ?? ''}}"
                                   class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Chaine de
                            valeur<span class="required">*</span>:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="chaine_valeur" name="chaine_valeur"
                                   value="{{$cluster->chaine_valeur->designation ?? ''}}" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nom/Intitulé du
                            projet cluster<span class="required">*</span>:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="nom_projet_cluster" name="nom_projet_cluster" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Objectifs<span
                                class="required">*</span>:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="objectifs" name="objectifs" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Statut du
                            projet<span class="required">*</span>:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="statut_projet" id="statut_projet" class="form-control">
                                <option value="">Votre choix</option>
                                @foreach($statutProjets as $statutProjet)
                                    <option value="{{$statutProjet->id}}"
                                            @if(old('statut_projet')==$statutProjet->id) selected="selected" @endif>{{$statutProjet->designation}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Résumé: <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" cols="30" name="resume" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Défis(problème):
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" cols="30" name="defis" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Causes du problème
                            constaté: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" cols="30" name="causes_probleme_constate"
                                      rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Indicateurs: <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" cols="30" name="indicateurs" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Complexité du
                            project(facilen moyenne, complexe): <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" cols="30" name="complexite_projet" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Complémentarité avec
                            des Programmes/Actions Similaires: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" cols="30" name="complementarite" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Localisation<span
                                class="required">*</span>:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="localisation" name="localisation" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Ville<span
                                class="required">*</span>:
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
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Département<span
                                class="required">*</span>:
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
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date prévisionnelle
                            lancement: <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2">
                            <input type="date" name="date_previsionnelle_lancement" id="date_previsionnelle_lancement"
                                   class="form-control">
                        </div>
                        <label class="col-form-label col-md-2 col-sm-2" for="last-name">Date effective lancement:<span
                                class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2">
                            <input type="date" name="date_effective_lancement" id="date_effective_lancement"
                                   required="required" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Date prévisionnelle clôture:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2">
                            <input type="date" name="date_previsionnelle_cloture" id="date_previsionnelle_cloture"
                                   class="form-control">
                        </div>
                        <label class="col-form-label col-md-2 col-sm-2">Date effective clôture:<span
                                class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2">
                            <input type="date" name="date_effective_cloture" id="date_effective_cloture"
                                   required="required" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Observation de l’expert cluster
                            responsable ou du gestionnaire
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" cols="30" name="observation_expert_gestionnaire"
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
                <hr>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Pièces jointes:
                    </label>

                    <div class="col-md-6 col-sm-6 ">
                        <form method="POST" action="{{url('document/upload/store')}}" enctype="multipart/form-data"
                              class="dropzone dropzone fform-horizontal form-label-left" id="dropzone">
                            @csrf
                            <input type="hidden" name="projet_cluster" value="projet_cluster">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  Projets clusters -->

    <!--  Risques d'un projet -->
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel collapsed">
            <div class="x_title">
                <h2>Risques d'un projet</h2>
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
                                    <th>N°</th>
                                    <th>Risque</th>
                                    <th>Proposition de mitigation</th>
                                    <th>Niveau du risque</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($risqueProjets as $risqueProjet)
                                    <tr>
                                        <td>{{$risqueProjet->id}}</td>
                                        <td>{{$risqueProjet->risque_identifie_mise_œuvre_projet}}</td>
                                        <td>{{$risqueProjet->proposition_mitigation}}</td>
                                        <td>{{$risqueProjet->designation}}</td>
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
                <form class="form-horizontal form-label-left" method="POST"
                      action="{{route('risque-projet.store')}}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Projet cluster<span
                                class="required">*</span>:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="projet_cluster" id="niveau_risque" class="form-control">
                                <option value="">Votre choix</option>
                                @foreach($projetClusters as $projetCluster)
                                    <option value="{{$projetCluster->id}}"
                                            @if(old('projet_cluster')==$projetCluster->id) selected="selected" @endif>{{$projetCluster->intitule_projet_cluster}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Risque identifié
                            dans la mise en œuvre du projet: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" cols="30" name="risque_identifie" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Proposition de
                            mitigation: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" cols="30" name="proposition_mitigation" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Niveau du
                            risque<span class="required">*</span>:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="niveau_risque" id="niveau_risque" class="form-control">
                                <option value="">Votre choix</option>
                                @foreach($niveauRisques as $niveauRisque)
                                    <option value="{{$niveauRisque->id}}"
                                            @if(old('niveau_risque')==$niveauRisque->id) selected="selected" @endif>{{$niveauRisque->designation}}</option>
                                @endforeach
                            </select>
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
    <!--  Risques d'un projet -->

    <!--  Acteurs associés au projet -->
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel collapsed">
            <div class="x_title">
                <h2>Acteurs associés au projet</h2>
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
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">

                                <table id="datatable-buttons" class="table table-striped table-bordered"
                                       style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Acteur associé</th>
                                        <th>Mode d'intervention</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>XXXX</td>
                                        <td>XXXX</td>
                                        <td>XXXX</td>
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
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Acteurs associés au
                            projet:<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                       <textarea class="form-control" cols="30" name="acteurs_associes" rows="3">
                       </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Mode d’intervention:<span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                       <textarea class="form-control" cols="30" name="mode_intervention" rows="3">
                       </textarea>
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
    <!--  Acteurs associés au projet -->

    <!--  Résultats du projet -->
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel collapsed">
            <div class="x_title">
                <h2>Résultats du projet</h2>
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
                                    <th>N°</th>
                                    <th>Code</th>
                                    <th>Intitulé</th>
                                    <th>Statut du résultat</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($resultatProjets as $resultatProjet)
                                    <tr>
                                        <td>{{$resultatProjet->id}}</td>
                                        <td>{{$resultatProjet->code_resultat}}</td>
                                        <td>{{$resultatProjet->intitule_resultat}}</td>
                                        <td>{{$resultatProjet->statut_resultat->designation}}</td>
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
                <form class="form-horizontal form-label-left" method="POST"
                      action="{{route('resultat-projet.store')}}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Code résultat<span
                                class="required">*</span>:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="code_resultat" name="code_resultat" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Intitulé
                            résultat<span class="required">*</span>:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="intitule_resultat" name="intitule_resultat" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Statut du
                            résultat<span class="required">*</span>:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="statut_resultat" id="statut_resultat" class="form-control">
                                <option value="">Votre choix</option>
                                @foreach($statutResultats as $statutResultat)
                                    <option value="{{$statutResultat->id}}"
                                            @if(old('statut_resultat')==$statutResultat->id) selected="selected" @endif>{{$statutResultat->designation}}</option>
                                @endforeach
                            </select>
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
    <!--  Résultats du projet -->

    <!--  Plan d'action d'un projet cluster par résultat et activité-->
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel collapsed">
            <div class="x_title">
                <h2>Plan d'action d'un projet cluster par résultat et activité</h2>
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
                                    <th>N°</th>
                                    <th>Résultat</th>
                                    <th>Code activité</th>
                                    <th>Intitulé activité</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($activiteProjets as $activiteProjet)
                                    <tr>
                                        <td>{{$activiteProjet->id}}</td>
                                        <td>{{$activiteProjet->resultat_projet->code_resultat.' - '.$activiteProjet->resultat_projet->intitule_resultat}}</td>
                                        <td>{{$activiteProjet->code_activite}}</td>
                                        <td>{{$activiteProjet->intitule_activite}}</td>
                                        <td>{{$activiteProjet->designation}}</td>
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
                <form class="form-horizontal form-label-left" method="POST"
                      action="{{route('activite-projet.store')}}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Résultat(Code
                            résultat - Intitulé résultat)<span class="required">*</span>:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="resultat" id="resultat" class="form-control">
                                <option value="">Votre choix</option>
                                @foreach($resultatProjets as $resultatProjet)
                                    <option value="{{$resultatProjet->id}}"
                                            @if(old('resultat')==$resultatProjet->id) selected="selected" @endif>{{$resultatProjet->code_resultat.' - '.$resultatProjet->intitule_resultat}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Code activité<span
                                class="required">*</span>:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="code_activite" name="code_activite" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Intitulé
                            activité<span class="required">*</span>:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="intitule_activite" name="intitule_activite" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Livrables:<span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" cols="30" name="livrables" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Date prévisionnelle
                            de démarrage<span class="required">*</span>:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_privisonnelle_demarrage" name="date_privisonnelle_demarrage"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date réelle de
                            démarrage<span class="required">*</span>:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_reelle_demarrage" name="date_reelle_demarrage"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Durée (h/j)<span
                                class="required">*</span>:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="duree_homme_jour" name="duree_homme_jour" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Per diem<span
                                class="required">*</span>:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="perdiem" name="perdiem" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Délais de mise en
                            œuvre:<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" cols="30" name="delais_mise_oeuvre" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Responsable<span
                                class="required">*</span>:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="responsable" name="responsable" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Besoins pour la mise
                            en œuvre:<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" cols="30" name="besoins_mise_oeuvre" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Observations sur les
                            besoins:<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" cols="30" name="observation_besoins" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Commentaire
                            éventuel:<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" cols="30" name="commentaire_eventuel" rows="3"></textarea>
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
    <!--  Plan d'action d'un projet cluster par résultat et activité -->

    <!--  Réunions du projet cluster-->
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel collapsed">
            <div class="x_title">
                <h2>Réunions du projet cluster</h2>
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
                                    <th>N°</th>
                                    <th>Date</th>
                                    <th>Lieu</th>
                                    <th>Ordre du jour</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reunionProjets as $reunionProjet)
                                    <tr>
                                        <td>{{$reunionProjet->id}}</td>
                                        <td>{{$reunionProjet->date}}</td>
                                        <td>{{$reunionProjet->lieu}}</td>
                                        <td>{{$reunionProjet->ordre_jour}}</td>
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
                <form class="form-horizontal form-label-left" method="POST"
                      action="{{route('reunion-projet.store')}}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Date<span
                                class="required">*</span>:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_reunion" name="date_reunion" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Lieu<span
                                class="required">*</span>:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="lieu_reunion" name="lieu_reunion" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Ordre du jour :<span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" cols="30" name="ordre_jour" rows="3"></textarea>
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
                <hr>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Pièces jointes:</label>
                    <div class="col-md-6 col-sm-6 ">
                        <form method="POST" action="{{url('document/upload/store')}}" enctype="multipart/form-data"
                              class="dropzone dropzone fform-horizontal form-label-left" id="dropzone">
                            @csrf
                            <input type="hidden" name="reunion_projet_cluster" value="reunion_projet_cluster">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  Réunions du projet cluster -->

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
@endpush

