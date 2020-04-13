@extends('layouts.master')
@section('title','Création d\'un TDR')
@section('content')
    <!-- Gestion des TDR  -->

    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Génération de TDR</h2>
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
                            <input type="text" id="numero_tdr" name="numero_tdr" class="form-control"
                                   value="{{$tdr->reference_tdr}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Titre de la mission
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="titre_mission" name="titre_mission" class="form-control"
                                   value="{{$tdr->titre_mission}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Composante/Sous-componsante
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="composante_sous_componsante" name="composante_sous_componsante"
                                   class="form-control" value="{{$tdr->composante_sous_composante}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Objet de la mission:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="objet_mission" name="objet_mission" class="form-control"
                                   value="{{$tdr->objet_mission}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Préstations
                            demandées: <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" cols="30" name="prestations_demandees" rows="3"
                                      readonly>{{$tdr->prestation_demandees}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Résultats attendus:
                            <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" cols="30" name="resultats_attendus" rows="3"
                                      readonly>{{$tdr->resultat_attendus}}</textarea>
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
                            <input type="text" id="cluster" name="cluster" class="form-control"
                                   value="{{$tdr->cluster}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Livrables attendus
                            en fin de mission
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" cols="30" name="livrable_attendus" rows="3"
                                      readonly>{{$tdr->livrable_attendus}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Lieu d'exécution:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="lieu_execution" name="lieu_execution" class="form-control"
                                   value="{{$tdr->lieu_execution}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date de démarrage:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_demarrage" name="date_demarrage" class="form-control"
                                   value="{{$tdr->date_demarrage}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Durée de la mission
                            (Homme/jour):
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="duree_mission" name="duree_mission" class="form-control"
                                   value="{{$tdr->duree_mission}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Période de
                            déroulement:
                            <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3">
                            <input type="date" name="date_debut" id="date_debut" class="form-control"
                                   value="{{$tdr->date_debut_mision}}" readonly>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <input type="date" name="date_fin" id="date_fin" required="required" class="form-control"
                                   value="{{$tdr->date_fin_mision}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date limite de
                            remise des livrable:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" id="date_limite_remise_livrables" name="date_limite_remise_livrables"
                                   class="form-control" value="{{$tdr->date_limite_remise_livrable}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Responsable du
                            suivi:
                            <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" name="responsable_suivi" id="responsable_suivi" class="form-control"
                                   value="{{$tdr->responsable_suivi}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Honoraires (/jour)
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="honoraires" id="honoraires" class="form-control"
                                   value="{{$tdr->montant_honoraires}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Dévise [XAF, EUR,
                            USD, …]
                        </label>
                        <div class="col-md-2 col-sm-2">
                            <input type="text" name="devise" id="devise" class="form-control" readonly>
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
                                   class="form-control" value="{{$tdr->montant_depense_accessoires}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Profils des experts
                            / compétences exigées (Profil de l’expertise) : <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" cols="30" name="profil_expert" rows="3"
                                      readonly>{{$tdr->profils_experts_competences_exigees}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Documents joints
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <table class="data table table-striped no-margin">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom du document</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td>1</td>
                                    <td><a href="#"
                                           target="_blank"><i class="fa fa-paperclip"></i>
                                            Document joints
                                        </a>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-7">
                            <a class="btn btn-primary" href="{{route('dossier-benefiaires.tdr.index')}}" role="button">Retour</a>
                            <button type="submit" class="btn btn-success">Modifier</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Gestion des TDR  -->

@endsection

@push('stylesheets')

@endpush

@push('scripts')

@endpush

