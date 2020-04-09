@extends('layouts.master')
@section('title','Validation des TDR')
@section('content')

    <!-- Gestion des TDR  -->
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Gestion des TDR</h2>
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
                                    <th>N° TDR</th>
                                    <th>Titre de la mission</th>
                                    <th>Componsante/sous-composante</th>
                                    <th>Objet de la mission</th>
                                    <th>Bénéficiaire</th>
                                    <th>Cluster</th>
                                    <th>Date de soumission</th>
                                    <th>Date de validation</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tdrs as $tdr)
                                    <tr>
                                        <td>{{$tdr->reference_tdr}}</td>
                                        <td>{{$tdr->titre_mission}}</td>
                                        <td>{{$tdr->composante_sous_composante}}</td>
                                        <td>{{$tdr->objet_mission}}</td>
                                        <td>{{$tdr->beneficiaire}}</td>
                                        <td>{{$tdr->cluster}}</td>
                                        <td>{{$tdr->date_soumission_tdr}}</td>
                                        <td>{{$tdr->date_approbation_tdr_on}}</td>
                                        <td>
                                            <a href=""
                                               class="btn btn-outline-warning btn-sm" title="Modifier"><i
                                                    class="fa fa-edit"></i></a>
                                            <a href="{{route('gestionnaire.tdr.circuit-validation.show',$tdr->id)}}"
                                               class="btn btn-outline-success btn-sm" title="Consulter"><i
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
    <!-- Gestion des TDR  -->

    <!-- Circuit de validation des TDR (ON, DUE)  -->

    <div class="col-md-12 col-sm-12">
        <div class="x_panel collapsed">
            <div class="x_title">
                <h2>Documents joints</h2>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Circuit de validation des TDR (ON, DUE)  -->

@endsection

@push('stylesheets')

@endpush

@push('scripts')

@endpush
