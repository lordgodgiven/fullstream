@extends('layouts.master')
@section('title','Validation TDR')
@section('content')
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Consultation du TDR</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">N°TDR
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="numero_tdr" name="numero_tdr" value="{{$tdr->reference_tdr}}"
                               class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Titre de la mission
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="titre_mission" name="titre_mission" value="{{$tdr->titre_mission}}"
                               class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Composante/Sous-componsante
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="composante_sous_componsante" value="{{$tdr->composante_sous_composante}}"
                               name="composante_sous_componsante"
                               class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Objet de la mission:
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="objet_mission" value="{{$tdr->objet_mission}}" name="objet_mission"
                               class="form-control" readonly>
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
                               value="{{$tdr->beneficiaire}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">cluster:
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="cluster" name="cluster" class="form-control" value="{{$tdr->cluster}}"
                               readonly>
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
                        <input type="text" id="lieu_execution" name="lieu_execution" class="form-control" readonly
                               value="{{$tdr->lieu_execution}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date de démarrage:
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="date" id="date_demarrage" name="date_demarrage" class="form-control" readonly
                               value="{{$tdr->date_demarrage}}">
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
                        <input type="date" name="date_debut" id="date_debut" class="form-control" readonly
                               value="{{$tdr->date_debut_mision}}">
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <input type="date" name="date_fin" id="date_fin" required="required" class="form-control"
                               readonly value="{{$tdr->date_fin_mision}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date limite de
                        remise des livrable:
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="date" id="date_limite_remise_livrables" name="date_limite_remise_livrables"
                               class="form-control" readonly value="{{$tdr->date_limite_remise_livrable}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Responsable du
                        suivi:
                        <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6">
                        <input type="text" name="responsable_suivi" id="responsable_suivi" class="form-control" readonly
                               value="{{$tdr->responsable_suivi}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Honoraires (/jour)
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="honoraires" id="honoraires" class="form-control" readonly
                               value="{{$tdr->montant_honoraires}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Dévise [XAF, EUR,
                        USD, …]
                    </label>
                    <div class="col-md-2 col-sm-2">
                        <select name="devise" id="devise" class="form-control">
                            <option value="">Votre choix</option>
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
                               class="form-control" readonly value="{{$tdr->montant_depense_accessoires}}">
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
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-5">
                        <a href="{{route('gestionnaire.tdr.circuit-validation.index')}}"
                           class="btn btn-success">Retour</a>
                        <a href="{{route('gestionnaire.tdr.circuit-validation.validation',$tdr->id)}}"
                           class="btn btn-primary">Suivant</a>
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
