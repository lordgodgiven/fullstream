@extends('layouts.master')
@section('title','Mes clusters')
@section('content')
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Liste des clusters</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <button type="button" class="btn btn-primary btn-sm">Primary</button>
                        </i>
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
                                    <th>Identifiant PRCCE</th>
                                    <th>Nom du cluster</th>
                                    <th>Chaîne de valeur</th>
                                    <th>Ville</th>
                                    <th>Département</th>
                                    <th>Reponsable cluster</th>
                                    <th>Date de création</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clusters as $cluster)
                                    <tr>
                                        <td>{{$cluster->numero_enregistrement}}</td>
                                        <td>{{$cluster->identificiant_prcce}}</td>
                                        <td>{{$cluster->nom_cluster}}</td>
                                        <td>{{$cluster->chaine_valeur->designation}}</td>
                                        <td>{{$cluster->commune_ville->designation}}</td>
                                        <td>{{$cluster->departement->designation}}</td>
                                        <td>{{$cluster->compte_utilisateur->nom}}</td>
                                        <td>{{$cluster->date_creation}}</td>
                                        <td>
                                            <a href=""
                                               class="btn btn-outline-warning btn-sm" title="Consulter"><i
                                                    class="fa fa-eye"></i></a>
                                            <a href="#" class="btn btn-outline-danger btn-sm" title="désinscrire"><i
                                                    class="fa fa-trash"></i></a>
                                            <a href="#" class="btn btn-outline-success btn-sm" title="inscription"><i
                                                    class="fa fa-plus"></i></a>
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
@endsection

@push('stylesheets')

@endpush

@push('scripts')

@endpush

