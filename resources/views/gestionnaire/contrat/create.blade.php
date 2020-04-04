@extends('layouts.master')
@section('title','Gestion des contrats')
@section('content')
    <!-- Gestion des contrats-->
    <div class="col-md-12 col-sm-12">
        <div class="x_panel collapsed">
            <div class="x_title">
                <h2>Enregistrement des informations de signature de contrat</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" method="POST"
                      action="">
                    @csrf

                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">TRD
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <select name="tdr" id="tdr" class="form-control">
                                <option value="">Votre choix</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Demande:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="demande" name="demande" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Prestataire:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="prestataire" name="prestataire" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Bénéficiaire:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="beneficiaire" name="beneficiaire" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Famille
                            d'intervention:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="famille_intervention" name="famille_intervention"
                                   class="form-control" readonly>
                        </div>
                    </div>
                    <hr>
                    <strong>Date de signature du contrat </strong>
                    <br>
                    <br>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date soumission des
                            du contrat:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_soumission_contrat" name="date_soumission_contrat"
                                   class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Référence du
                            contrat:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="reference_contrat" name="reference_contrat" class="form-control"
                                   readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date de signature
                            par le prestataire:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_signature_prestataire" name="date_signature_prestataire"
                                   class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date de signature
                            par le gestionnaire:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_signature_gestionnaire" name="date_signature_gestionnaire"
                                   class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Type d'AT:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="type_at" id="type_at" class="form-control">
                                <option value="">Votre choix</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date
                            d’enregistrement:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_enregistrement" name="date_enregistrement" class="form-control">
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
    <!-- Gestion des contrats-->
@endsection

@push('stylesheets')

@endpush

@push('scripts')

@endpush

