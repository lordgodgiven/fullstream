@extends('layouts.master')
@section('title','Suivi des actions de structuration des clusters')
@section('content')
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Gestion des actions de structuration des clusters</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="btn btn-outline-success btn-sm"
                           href="{{route('cluster-beneficiaire.structuration.create')}}" role="button"><i
                                class="fa fa-plus"></i></a>
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
                                    <th>TDR</th>
                                    <th>Cluster</th>
                                    <th>Phase</th>
                                    <th>Etape</th>
                                    <th>Etape/Action</th>
                                    <th>Type action de structuration</th>
                                    <th>Date de début (prévisionnelle)</th>
                                    <th>Date de début (réelle)</th>
                                    <th>Date de fin (prévisionnelle)</th>
                                    <th>Date de fin (réelle)</th>
                                    <th>Durée expertise (Homme/jour)</th>
                                    <th>Lieu d’exécution</th>
                                    <th>Nombre de participants</th>
                                    <th>Taux de réalisation (progression en %)</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($actionStructurations as $actionStructuration)
                                    <tr>
                                        <td>{{$actionStructuration->ref_tdr_id}}</td>
                                        <td>{{$actionStructuration->cluster_id}}</td>
                                        <td>{{$actionStructuration->phase_mise_en_oeuvre->designation}}</td>
                                        <td>{{$actionStructuration->etape}}</td>
                                        <td>{{$actionStructuration->activite}}</td>
                                        <td>{{$actionStructuration->type_action_structure->designation}}</td>
                                        <td>{{$actionStructuration->date_debut_prevue}}</td>
                                        <td>{{$actionStructuration->date_debut_effective}}</td>
                                        <td>{{$actionStructuration->date_fin_prevue}}</td>
                                        <td>{{$actionStructuration->date_fin_effective}}</td>
                                        <td>{{$actionStructuration->duree_homme_jour_prevue}}</td>
                                        <td>{{$actionStructuration->lieu_execution}}</td>
                                        <td>{{$actionStructuration->nombre_participant}}</td>
                                        <td>{{$actionStructuration->taux_progression}}</td>
                                        <td>
                                            <a href="#" class="btn btn-outline-success btn-sm" title="Consulter"><i
                                                    class="fa fa-eye"></i></a>
                                            <a href="#" class="btn btn-outline-warning btn-sm" title="modifier"><i
                                                    class="fa fa-edit"></i></a>
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
@endsection

@push('stylesheets')

@endpush

@push('scripts')

@endpush
