@extends('layouts.master')
@section('title','Gestion des contrats')
@section('content')
    <!-- Enregistrement du versement de la contribution des bénéficiaires -->
    <div class="col-md-12 col-sm-12">
        <div class="x_panel collapsed">
            <div class="x_title">
                <h2>Enregistrement du versement de la contribution des bénéficiaires </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" method="POST"
                      action="{{route('gestionnaire.contribution.beneficiaire.store')}}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Date
                            d’enregistrement
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="date" id="date_enregistrement" name="date_enregistrement" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Date de versement:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_versement" name="date_versement" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Taux de la
                            contribution:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="taux_contribution" name="taux_contribution" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Montant de la
                            contribution:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="montant_contribution" name="montant_contribution"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Devise* [XAF, EUR,
                            USD, …]:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="devise" id="devise" class="form-control">
                                <option value="">votre choix</option>
                                @foreach($devises as $devise)
                                    <option value="{{$devise->id}}">{{$devise->code.' => '.$devise->devise}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Taux en EUR:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="taux" name="taux" class="form-control" placeholder="=1, si EUR">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Observation du
                            Gestionnaire:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" cols="30" name="observations" rows="3"></textarea>
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
                <h2>Documents joints</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Justificatif de
                        versement:
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
    <!-- Enregistrement du versement de la contribution des bénéficiaires -->
@endsection

@push('stylesheets')

@endpush

@push('scripts')

@endpush

