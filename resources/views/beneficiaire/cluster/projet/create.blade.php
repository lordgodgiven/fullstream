@extends('layouts.master')
@section('title','Gestion de projet cluster')
@section('content')
    <!-- Gestion des clusters -->
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2> Gestion des clusters </h2>
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
                    <form class="form-horizontal form-label-left" method="POST"
                          action="{{route('projet-cluster.store')}}">
                        @csrf
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nom du
                                cluster<span
                                    class="required">*</span>:
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="nom_cluster" name="nom_cluster"
                                       value="{{$cluster->nom_cluster ?? ''}}"
                                       class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Chaine de
                                valeur<span class="required">*</span>:
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="chaine_valeur" name="chaine_valeur"
                                       value="{{$cluster->chaine_valeur->designation ?? ''}}" class="form-control"
                                       readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nom/Intitulé du
                                projet cluster<span class="required">*</span>:
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="nom_projet_cluster" name="nom_projet_cluster"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Objectifs<span
                                    class="required">*</span>:
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="objectifs" name="objectifs" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Statut du
                                projet<span class="required">*</span>:
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <select name="statut_projet" id="statut_projet" class="form-control">
                                    <option value="">Votre choix</option>
                                    @foreach($statutProjets as $statutProjet)
                                        <option value="{{$statutProjet->id}}"
                                                @if(old('statut_projet')==$statutProjet->id) selected="selected" @endif>{{$statutProjet->designation}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Résumé: <span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <textarea class="form-control" cols="30" name="resume" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Défis(problème):
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <textarea class="form-control" cols="30" name="defis" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Causes du
                                problème
                                constaté: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" cols="30" name="causes_probleme_constate"
                                      rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Indicateurs:
                                <span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <textarea class="form-control" cols="30" name="indicateurs" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Complexité du
                                project(facilen moyenne, complexe): <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <textarea class="form-control" cols="30" name="complexite_projet" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Complémentarité
                                avec
                                des Programmes/Actions Similaires: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <textarea class="form-control" cols="30" name="complementarite" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                   for="last-name">Localisation<span
                                    class="required">*</span>:
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="localisation" name="localisation" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Ville<span
                                    class="required">*</span>:
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <select name="ville" id="ville" class="form-control">
                                    <option value="">Votre choix</option>
                                    @foreach($villes as $ville)
                                        <option value="{{$ville->id}}"
                                                @if(old('ville')==$ville->id) selected="selected" @endif>{{$ville->designation}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Département<span
                                    class="required">*</span>:
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <select name="departement" id="departement" class="form-control">
                                    <option value="">Votre choix</option>
                                    @foreach($departements as $departement)
                                        <option value="{{$departement->id}}"
                                                @if(old('departement')==$departement->id) selected="selected" @endif>{{$departement->designation}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date
                                prévisionnelle lancement: <span class="required">*</span>
                            </label>
                            <div class="col-md-2 col-sm-2">
                                <input type="date" name="date_previsionnelle_lancement"
                                       id="date_previsionnelle_lancement"
                                       class="form-control">
                            </div>
                            <label class="col-form-label col-md-2 col-sm-2" for="last-name">Date effective
                                lancement:<span class="required">*</span>
                            </label>
                            <div class="col-md-2 col-sm-2">
                                <input type="date" name="date_effective_lancement" id="date_effective_lancement"
                                       required="required" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Date prévisionnelle clôture:
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-2 col-sm-2">
                                <input type="date" name="date_previsionnelle_cloture" id="date_previsionnelle_cloture"
                                       class="form-control">
                            </div>
                            <label class="col-form-label col-md-2 col-sm-2">Date effective clôture:<span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-2 col-sm-2">
                                <input type="date" name="date_effective_cloture" id="date_effective_cloture"
                                       required="required" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Observation de l’expert cluster
                                responsable ou du gestionnaire
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" cols="30" name="observation_expert_gestionnaire"
                                      rows="3"></textarea>
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
                    <hr>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Pièces jointes:
                        </label>

                        <div class="col-md-6 col-sm-6 ">
                            <form method="POST" action="{{url('document/upload/store')}}" enctype="multipart/form-data"
                                  class="dropzone dropzone fform-horizontal form-label-left" id="dropzone">
                                @csrf
                                <input type="hidden" name="projet_cluster" value="projet_cluster">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gestion des clusters-->

@endsection

@push('stylesheets')

@endpush

@push('scripts')
    <script src="{{asset('js/liste_beneficiaire_secretaires.js')}}"></script>
    <script src="{{asset('js/liste_beneficiaire_presidents.js')}}"></script>
@endpush

