@extends('layouts.master')
@section('title','Liste des prestataires')
@section('content')

    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>En attente d'accréditations de niveau 2</h2>
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
                                    <th>Identifiant PRCCEE</th>
                                    <th>Nom(s)</th>
                                    <th>Prénom(s)</th>
                                    <th>Téléphone</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>


                                <tbody>
                                @foreach($dossierPrestataires as $dossierPrestataire)

                                    <tr>
                                        <td>{{$dossierPrestataire->dossier_prestataire->identifiant_prcce ?? ''}}</td>
                                        <td>{{$dossierPrestataire->dossier_prestataire->individu->nom ?? ''}}</td>
                                        <td>{{$dossierPrestataire->dossier_prestataire->individu->prenom ?? ''}}</td>
                                        <td>{{$dossierPrestataire->dossier_prestataire->telephone  ?? ''}}</td>
                                        <td>
                                            <a href="{{route('gestionnaire.prestataire.accreditation_level_two',$dossierPrestataire->id)}}"
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
