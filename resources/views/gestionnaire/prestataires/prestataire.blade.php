@extends('layouts.master')
@section('title','Liste des prestataires')
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
                                    <th>NIU</th>
                                    <th>Code départ.</th>
                                    <th>Civilité</th>
                                    <th>Sexe</th>
                                    <th>Nom</th>
                                    <th>Nom jeune fille</th>
                                    <th>Prénom</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>


                                <tbody>
                                @foreach($dossierPrestataires as $dossierPrestataire)

                                    <tr>
                                        <td>{{$dossierPrestataire->individu->identifiant_prcce ?? ''}}</td>
                                        <td>{{$dossierPrestataire->individu->niu ?? ''}}</td>
                                        <td>{{$dossierPrestataire->departement->designation ?? ''}}</td>
                                        <td>{{$dossierPrestataire->individu->civilite->designation  ?? ''}}</td>
                                        <td>{{$dossierPrestataire->individu->genre_sexe->designation  ?? ''}}</td>
                                        <td>{{$dossierPrestataire->individu->nom  ?? ''}}</td>
                                        <td>{{$dossierPrestataire->individu->nom_jeune_fille  ?? ''}}</td>
                                        <td>{{$dossierPrestataire->individu->prenom  ?? ''}}</td>
                                        <td>
                                            <a href="{{route('gestionnaire.prestataire.show',$dossierPrestataire->id)}}"
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
