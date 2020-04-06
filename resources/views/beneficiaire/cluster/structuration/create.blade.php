@extends('layouts.master')
@section('title','Suivi des actions de structuration des clusters')
@section('content')
    <!-- Gestion des actions de structuration des clusters -->
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Gestion des actions de structuration des clusters</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" method="POST"
                      action="{{route('cluster-beneficiaire.structuration.store')}}">
                    @csrf
                    <input type="hidden" id="secretaire_id" name="secretaire_id"/>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">N°TDR
                            <span class="required">*</span>:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="numero_tdr" id="numero_tdr" class="form-control">
                                <option value="">Votre choix</option>
                                @foreach($tdrs as $tdr)
                                    <option value="{{$tdr->id}}">{{$tdr->reference_tdr}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Cluster
                            <span class="required">*</span>:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="cluster" id="cluster" class="form-control">
                                <option value="">Votre choix</option>
                                @foreach($clusters as $cluster)
                                    <option
                                        value="{{$cluster->dossier_beneficiaire_id}}">{{$cluster->nom_cluster}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Phase
                            <span class="required">*</span>:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="phase" id="phase" class="form-control">
                                <option value="">Votre choix</option>
                                @foreach($phases as $phase)
                                    <option value="{{$phase->id}}">{{$phase->designation}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Etape :
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="etape" id="etape" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Activité :
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="activite" id="activite" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Type action de structuration: <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="type_action_structuration" id="type_action_structuration"
                                    class="form-control">
                                <option value="">Votre choix</option>
                                @foreach($typeActions as $typeAction)
                                    <option value="{{$typeAction->id}}">{{$typeAction->designation}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date prévisionnelle
                            de début / fin :
                        </label>
                        <div class="col-md-3 col-sm-3">
                            <input type="date" name="date_debut_previsionnelle" id="date_debut_previsionnelle"
                                   class="form-control">
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <input type="date" name="date_fin_previsionnelle" id="date_fin_previsionnelle"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Durée expertise
                            prévue (Homme/jour)
                            <span class="required">* :</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="duree_expertise_prevue" id="duree_expertise_prevue"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Lieu d'exécution
                            <span class="required">* :</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="lieu_execution" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date effective de
                            début / fin :
                        </label>
                        <div class="col-md-3 col-sm-3">
                            <input type="date" name="date_debut_effective" id="date_debut_effective"
                                   class="form-control">
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <input type="date" name="date_fin_effective" id="date_fin_effective" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Durée expertise
                            réalisée (Homme/jour)
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" name="duree_expertise_realisee" id="duree_expertise_realisee"
                                   required="required" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Taux de réalisation
                            (progression en %)
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="taux_realisation" id="taux_realisation" required="required"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nombre de
                            participants
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="nombre_participant" id="nombre_participants" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Commentaire du
                            gestionnaire
                            : <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" cols="30" name="commentaire_gestionnaire"
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
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Pièces jointes (si
                        applicable):
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <form method="POST" action="{{url('document/upload/store')}}" enctype="multipart/form-data"
                              class="dropzone dropzone form-horizontal form-label-left" id="dropzone">
                            @csrf
                            <input type="hidden" name="identite" value="identite">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gestion des actions de structuration des clusters -->

    <!-- Modal Présidents-->
    <div class="modal fade" id="listeBeneficiairePresidents" tabindex="-1" role="dialog"
         aria-labelledby="listeBeneficiairePresidents"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Liste des bénéficiaires <img src="{{asset('images/hourglass.gif')}}"
                                                                         id="label_loading_liste_beneficiaire_president"
                                                                         height="10%" width="25%"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="liste_beneficiaire_president" id="label_choix_president">Choix du président</label>
                        <div class="text-center">
                            <img src="{{asset('images/hourglass.gif')}}" id="loading_liste_beneficiaire_president"
                                 height="25%" width="25%">
                        </div>
                        <select multiple class="form-control" id="liste_beneficiaire_president"
                                name="liste_beneficiaire_president">
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Présidents-->
@endsection

@push('stylesheets')

@endpush

@push('scripts')

@endpush

