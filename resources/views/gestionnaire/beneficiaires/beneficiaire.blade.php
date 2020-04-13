@extends('layouts.master')
@section('title','Liste des beneficaire')
@section('content')

    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>En attente d'eligibité</h2>
                <ul class="nav navbar-right panel_toolbox"></ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">

                            <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th>N°PRCCEE</th>
                                    <th>Raison sociale</th>
                                    <th>Nom et prénom</th>
                                    <th>Sécteur ou domaine d'activité</th>
                                    <th>Activité principale</th>
                                    <th>Gérant</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>


                                <tbody>
                                @foreach($dossierBeneficiaires as $dossierBeneficiaire)
                                    <tr>
                                        <td>{{$dossierBeneficiaire->identifiant_prcce ?? ''}}</td>
                                        <td>{{$dossierBeneficiaire->denomination_raison_sociale?? ''}}</td>
                                        <td>{{$dossierBeneficiaire->nom.' '.$dossierBeneficiaire->prenom}}</td>
                                        <td>{{$dossierBeneficiaire->secteur_juridique->designation ?? ''}}</td>
                                        <td>{{$dossierBeneficiaire->activite_principale->designation ?? ''}}</td>
                                        <td>{{$dossierBeneficiaire->gerant_responsable  ?? ''}}</td>
                                        <td class="text-center">
                                            <a href="{{route('gestionnaire.beneficiaire.show',$dossierBeneficiaire->id)}}"
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
@endsection

@push('stylesheets')

@endpush

@push('scripts')

@endpush
