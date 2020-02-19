@extends('layouts.master')
@section('title','Liste des beneficaire')
@section('content')

    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>En attente d'eligibité</h2>
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
                                    <th>N°PRCCEE</th>
                                    <th>Sigle ou abreviation</th>
                                    <th>Raison sociale</th>
                                    <th>Nom et prénom</th>
                                    <th>Sécteur ou domaine d'activité</th>
                                    <th>Activité principale</th>
                                    <th>Date éligibilité</th>
                                    <th>Gérant/Responsable</th>
                                    <th>Téléphone</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>


                                <tbody>
                                @foreach($dossierBeneficiaires as $dossierBeneficiaire)
                                    <tr>
                                        <td>{{$dossierBeneficiaire->id}}</td>
                                        <td>{{$dossierBeneficiaire->identifiant_prcceii ?? ''}}</td>
                                        <td>{{$dossierBeneficiaire->sigle_abbreviation ?? ''}}</td>
                                        <td>{{$dossierBeneficiaire->denomination_raison_sociale?? ''}}</td>
                                        <td>{{$dossierBeneficiaire->nom.' '.$dossierBeneficiaire->prenom}}</td>
                                        <td>{{$dossierBeneficiaire->secteur_juridique->designation ?? ''}}</td>
                                        <td>{{$dossierBeneficiaire->activite_principale->designation ?? ''}}</td>
                                        <td>{{$dossierBeneficiaire->eligibilite_beneficiaire->date  ?? ''}}</td>
                                        <td>{{$dossierBeneficiaire->gerant_responsable  ?? ''}}</td>
                                        <td>{{$dossierBeneficiaire->telephone ?? ''}}</td>

                                        <td class="text-center">
                                            <a href="#" class="btn btn-outline-warning btn-sm" title="Modifier"> <i
                                                    class="fa fa-edit"></i></a>
                                            <a href="#" class="btn btn-outline-danger btn-sm" title="Consulter"><i
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
