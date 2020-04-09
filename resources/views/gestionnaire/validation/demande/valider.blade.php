@extends('layouts.master')
@section('title','Validation TDR')
@section('content')
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Circuit de validation des TDR (ON, DUE) </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" method="POST"
                      action="{{route('gestionnaire.tdr.circuit-validation.store')}}">
                    @csrf
                    <strong>Visas</strong>
                    <br/>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Date de validation
                            / soumission par le Gestionnaire
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_validation" name="date_validation" class="form-control">
                            <input type="hidden" name="tdr_id" value="{{$tdr->id}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Visa de l'ONs :
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2">
                            <select name="visa_ons" id="visa_ons" class="form-control">
                                <option value="">Votre choix</option>
                                @foreach($visaDecisions as $visaDecision)
                                    <option value="{{$visaDecision->id}}">{{$visaDecision->designation}}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="col-form-label col-md-2 col-sm-2 label-align" for="last-name">Date visa ONs :
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2">
                            <input type="date" name="date_visa_ons" id="date_visa_ons" required="required"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Visa de la DUE :
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2">
                            <select name="visa_due" id="visa_due" class="form-control">
                                <option value="">Votre choix</option>
                                @foreach($visaDecisions as $visaDecision)
                                    <option value="{{$visaDecision->id}}">{{$visaDecision->designation}}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="col-form-label col-md-2 col-sm-2 label-align" for="last-name">Date visa DUE :
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2">
                            <input type="date" name="date_visa_due" id="date_visa_due" required="required"
                                   class="form-control">
                        </div>
                    </div>
                    <hr>
                    <strong>Approbation des TDR</strong>
                    <br/>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date soumission des
                            TDR:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="date_soumission_tdr" name="date_soumission_tdr"
                                   value="{{$tdr->created_at}}" class="form-control"
                                   readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date approbation des
                            TDR par l’ON: <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_approbation_tdr_on" name="date_approbation_tdr_on"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date approbation des
                            TDR par la DUE:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_approbation_tdr_due" name="date_approbation_tdr_due"
                                   class="form-control">
                        </div>
                    </div>
                    <hr>
                    <strong>Approbation des CV</strong>
                    <br/>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date de réception
                            des CV siège l’AT AGRER:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_reception_cv_siege_agrer" name="date_reception_cv_siege_agrer"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date d’approbation
                            des CV par l’ON:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_approbation_cv_on" name="date_approbation_cv_on"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date d’approbation
                            des CV par la DUE:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_approbation_cv_due" name="date_approbation_cv_due"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Observation:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" cols="30" name="observations" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-5">
                            <button class="btn btn-primary" type="reset">Effacer</button>
                            <button type="submit" class="btn btn-success">Valider</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('stylesheets')

@endpush

@push('scripts')

@endpush
