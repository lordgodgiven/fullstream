@extends('layouts.master')
@section('title','Validation des TDR')
@section('content')
    <!-- Gestion des TDR  -->
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Gestion des TDR</h2>
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
                                            <a href="{{route('gestionnaire.tdr.circuit-validation.show',$tdr->id)}}"
                                               class="btn btn-outline-success btn-sm" title="Consulter"><i
                                                    class="fa fa-eye"></i></a>
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
@endsection

@push('stylesheets')

@endpush

@push('scripts')

@endpush
