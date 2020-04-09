@extends('layouts.master')
@section('title','Gestion des TDR')
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
                                                    class="fa fa-eye"></i></a>
                                            <a href="#" class="btn btn-outline-success btn-sm" title="Consulter"><i
                                                    class="fa fa-edit"></i></a>
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
    <div class="col-md-12 col-sm-12">
        <div class="x_panel collapsed">
            <div class="x_title">
                <h2>Génération et gestion des TDR</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" method="POST"
                      action="{{route('dossier-benefiaires.tdr.store')}}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">N°TDR
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="numero_tdr" name="numero_tdr" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Titre de la mission
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="titre_mission" name="titre_mission" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Composante/Sous-componsante
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="composante_sous_componsante" name="composante_sous_componsante"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Objet de la mission:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="objet_mission" name="objet_mission" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Préstations
                            demandées: <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" cols="30" name="prestations_demandees" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Résultats attendus:
                            <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" cols="30" name="resultats_attendus" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Beneficiaire:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="beneficiare" name="beneficiare" class="form-control"
                                   value="{{$beneficiare->nom.' '.$beneficiare->prenom}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">cluster:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="cluster" name="cluster" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Livrables attendus
                            en fin de mission
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" cols="30" name="resultats_attendus" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Lieu d'exécution:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="lieu_execution" name="lieu_execution" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date de démarrage:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_demarrage" name="date_demarrage" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Durée de la mission
                            (Homme/jour):
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="duree_mission" name="duree_mission" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Période de
                            déroulement:
                            <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3">
                            <input type="date" name="date_debut" id="date_debut" class="form-control">
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <input type="date" name="date_fin" id="date_fin" required="required" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date limite de
                            remise des livrable:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_limite_remise_livrables" name="date_limite_remise_livrables"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Responsable du
                            suivi:
                            <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" name="responsable_suivi" id="responsable_suivi" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Honoraires (/jour)
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="honoraires" id="honoraires" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Dévise [XAF, EUR,
                            USD, …]
                        </label>
                        <div class="col-md-2 col-sm-2">
                            <select name="devise" id="devise" class="form-control">
                                <option value="">Votre choix</option>
                                @foreach($devises as $devise)
                                    <option value="{{$devise->id}}">{{$devise->code}}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="col-form-label col-md-2 col-sm-2 label-align" for="last-name">Taux en € (= 1, si
                            €)
                        </label>
                        <div class="col-md-2 col-sm-2">
                            <input type="text" name="taux_convertion_euro" id="taux_convertion_euro" required="required"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Dépenses accessoires
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="depenses_accessoires" id="depenses_accessoires"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Profils des experts
                            / compétences exigées (Profil de l’expertise) : <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" cols="30" name="profil_expert" rows="3"></textarea>
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
    <!-- Gestion des TDR  -->

@endsection

@push('stylesheets')

@endpush

@push('scripts')

@endpush

