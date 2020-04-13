@extends('layouts.master')
@section('title','Liste des clusters')
@section('content')
    <!-- Gestion des clusters -->
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2> Gestion des clusters </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="btn btn-success" href="{{route('gestionnaire-cluster.create')}}" role="button"
                           title="Créer un nouveau cluster"><i class="fa fa-2x fa-plus"></i></a>
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
@endsection

@push('stylesheets')

@endpush

@push('scripts')

@endpush


