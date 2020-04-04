@extends('layouts.master')
@section('title','Gestion des demandes de prestataires')
@section('content')
    <!-- Gestion des demandes de prestataires  -->
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2> Gestion des demandes de prestataires </h2>
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
                                    <th>Sigle ou abréviation</th>
                                    <th>Raison sociale</th>
                                    <th>Nom et prénom</th>
                                    <th>Famille d'intervention</th>
                                    <th>Date de création</th>
                                    <th>Type de demande</th>
                                    <th>Cluster</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($demandePrestations as $demandePrestation)
                                    <tr>
                                        <td>{{$demandePrestation->id}}</td>
                                        <td>{{$demandePrestation->dossier_beneficiaire->identifiant_prcce}}</td>
                                        <td>{{$demandePrestation->dossier_beneficiaire->sigle_abbreviation}}</td>
                                        <td>{{$demandePrestation->dossier_beneficiaire->denomination_raison_sociale}}</td>
                                        <td>{{$demandePrestation->dossier_beneficiaire->nom.' '.$demandePrestation->dossier_beneficiaire->prenom}}</td>
                                        <td>{{$demandePrestation->famille_intervention->designation}}</td>
                                        <td>{{$demandePrestation->date_creation}}</td>
                                        <td>{{$demandePrestation->type_demande->designation}}</td>
                                        <td>{{$demandePrestation->cluster->nom_cluster}}</td>
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
    <!-- Gestion des demandes de prestataires  -->

    <div class="col-md-12 col-sm-12">
        <div class="x_panel collapsed">
            <div class="x_title">
                <h2>Demande</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" method="POST"
                      action="{{route('dossier-beneficiaire.prestation.store')}}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Date de création
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_creation" name="date_creation" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Date de
                            modification
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_modification" name="date_modification" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Situation de la
                            demande:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="situation_demande" id="situation_demande" class="form-control">
                                <option value="">Votre choix</option>
                                @foreach($situationDemandes as $situationDemande)
                                    <option value="{{$situationDemande->id}}"
                                            @if(old('situation_demande')==$situationDemande->id) selected="selected" @endif>{{$situationDemande->designation}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Famille
                            d'intervention:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="famille_intervention" id="famille_intervention" class="form-control">
                                <option value="">Votre choix</option>
                                @foreach($familleInterventions as $familleIntervention)
                                    <option value="{{$familleIntervention->id}}"
                                            @if(old('famille_intervention')==$familleIntervention->id) selected="selected" @endif>{{$familleIntervention->designation}}</option>
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
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Type de demande:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="type_demande" id="type_demande" class="form-control">
                                <option value="">Votre choix</option>
                                @foreach($typeDemandes as $typeDemande)
                                    <option value="{{$typeDemande->id}}"
                                            @if(old('type_demande')==$typeDemande->id) selected="selected" @endif>{{$typeDemande->designation}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Cluster:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="cluster" id="cluster" class="form-control">
                                <option value="">Votre choix</option>
                                @foreach($clusters as $cluster)
                                    <option value="{{$cluster->dossier_beneficiaire_id}}"
                                            @if(old('cluster')==$cluster->dossier_beneficiaire_id) selected="selected" @endif>{{$cluster->nom_cluster}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Période souhaitée:
                            <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3">
                            <input type="date" name="date_debut" id="date_debut" class="form-control">
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <input type="date" name="date_fin" id="date_fin" required="required" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Durée (Nbre
                            Homme/jour)
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="duree" id="duree" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Zone d’intervention
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="zone_intervention" id="zone_intervention" class="form-control">
                                <option value="">Votre choix</option>
                                @foreach($zoneInterventions as $zoneIntervention)
                                    <option value="{{$zoneIntervention->id}}"
                                            @if(old('zone_intervention')==$zoneIntervention->id) selected="selected" @endif>{{$zoneIntervention->designation}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Motivations: <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            Qu'est-ce qui motive votre demande ?
                            <textarea class="form-control" cols="30" name="motivations" rows="3"></textarea>
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
                <h2>Pièces à joindre à la demande</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Indiquer la liste des
                        pièces (si applicable):
                    </label>

                    <div class="col-md-6 col-sm-6 ">
                        <form method="POST" action="{{url('document/upload/store')}}" enctype="multipart/form-data"
                              class="dropzone dropzone fform-horizontal form-label-left" id="dropzone">
                            @csrf
                            <input type="hidden" name="demande_prestations" value="demande_prestations">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('stylesheets')

@endpush

@push('scripts')
    <script src="{{asset('js/sous_categorie_loader.js')}}"></script>
@endpush

