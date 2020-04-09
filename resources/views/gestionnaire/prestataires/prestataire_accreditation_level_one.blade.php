@extends('layouts.master')
@section('title','Information sur le prestataire')
@section('content')

    <!-- Motivations -->
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Motivations</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group row">
                    <label class="col-form-label col-md-1 col-sm-1" for="last-name">Motivation: </label>
                    <div class="col-md-11 col-sm-11 ">
                        <textarea class="form-control" cols="100" name="motivations" rows="5"
                                  readonly>{{$dossierPrestataire->dossier_prestataire->motivation ?? ''}}</textarea>
                    </div>
                </div>
                <div class="ln_solid"></div>
            </div>
        </div>
    </div>
    <!-- /Motivations -->

    <!-- Documents fournis -->
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Documents fournis</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="data table table-striped no-margin">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom du document</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dossierPrestataire->dossier_prestataire->compte_utilisateur->document_uploads as $document_upload)
                        <tr>
                            <td>{{$document_upload->id}}</td>
                            <td><a href="/documents/{{$document_upload->filename}}"
                                   target="_blank"><i
                                        class="fa fa-paperclip"></i> {{$document_upload->filename}}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Documents fournis -->

    <!-- Gestion des accréditations de niveau 1 -->
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Gestion des accréditations de niveau 1 – Vérification documentaire et physique</h2>
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
                                    <th>Date</th>
                                    <th>Avis / décision du Gestionnaire</th>
                                    <th>Niveau d‘accréditation</th>
                                    <th>Ancien niveau d‘accréditation</th>
                                    <th>Transition</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($accreditations as $accreditation)
                                    <tr>
                                        <td>{{$accreditation->date_decision_accreditation}}</td>
                                        <td>{{$accreditation->visa_decision->designation}}</td>
                                        <td>{{$accreditation->niveau_accreditation->designation}}</td>
                                        <td>@if($accreditation->ref_ancien_accreditation === 1) Aucune accréditation
                                            @elseif($accreditation->ref_ancien_accreditation === 2) Accréditation de
                                                niveau 1
                                            @elseif($accreditation->ref_ancien_accreditation === 3) Accréditation de
                                                niveau 2
                                            @elseif($accreditation->ref_ancien_accreditation === 4) Accréditation de
                                                niveau 3 @endif</td>
                                        <td>{{$accreditation->transition_accreditation->designation}}</td>
                                        <td>
                                            <a href=""
                                               class="btn btn-outline-danger btn-sm" title="Consulter"><i
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
    <!-- Gestion des accréditations de niveau 1 -->

    <!-- Accreditation niveau 1 -->
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Accréditation de niveau 1 – Vérification documentaire et physique</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form id="accreditation_level_one"
                      action="{{route('gestionnaire.prestataire.store.accreditation_level_one',$id)}}" method="POST"
                      data-parsley-validate>
                    @csrf
                    <b>Documents obligatoires (par e-mail ou sur Google Drive, hors plateforme)</b>
                    <br>
                    CV au format électronique ?
                    <br>
                    Copie électronique de votre/vos diplôme(s) ou certificat(s) ?
                    <br>
                    Références du dossier ?
                    <br>
                    Texte de motivation à prester pour le PRCCE II ?
                    <br>
                    <hr>
                    <label>Etat dossier (complet, incomplet)* :</label>
                    <p>
                        Complet:
                        <input type="radio" class="flat" name="etat_dossier" id="complet" value="1" required/>
                        Incomplet:
                        <input type="radio" class="flat" name="etat_dossier" id="incomplet" checked="" value="2"/>
                    </p>
                    <label for="observation">Observation du gestionnaire :</label>
                    <textarea id="observation" required="required" class="form-control" name="observation"
                              rows="5"></textarea>
                    <br/>
                    <br>
                    <div class="item form-group">
                        <label class="col-form-label col-md-7 col-sm-7 " for="noteA">Pertinence de diplôme(s) ou
                            certificat(s) pour le domaine choisi ? (/15 points)<span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2 ">
                            <input type="text" name="noteA" id="noteA" required="required" class="form-control"
                                   placeholder="NOTE A  /15">

                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-7 col-sm-7" for="noteB">Expérience requise pour le domaine ?
                            (/15 points)<span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2 ">
                            <input type="text" name="noteB" id="noteB" required="required" class="form-control"
                                   placeholder="NOTE B  /15">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="noteC" class="col-form-label col-md-7 col-sm-7">Les références attestent-elles des
                            compétences du candidat dans le domaine choisi ? (/40 points) <span
                                class="required">*</span></label>
                        <div class="col-md-2 col-sm-2 ">
                            <input id="noteC" class="form-control" type="text" name="noteC" placeholder="NOTE C  /40">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="noteD" class="col-form-label col-md-7 col-sm-7">Le texte de motivation atteste-t-il
                            d'une connaissance maitrisée de la langue ? (/10 points) <span
                                class="required">*</span></label>
                        <div class="col-md-2 col-sm-2">
                            <input id="noteD" class="form-control" type="text" name="noteD" placeholder="NOTE D  /10">
                        </div>
                    </div>
                    <hr>
                    <div class="item form-group">
                        <label for="total" class="col-form-label col-md-7 col-sm-7">Note total calculée (somme des 4
                            notes) NT = A + B + C + D <span class="required">*</span></label>
                        <div class="col-md-2 col-sm-2">
                            <input id="total" class="form-control" type="text" name="total" placeholder="NT  /100"
                                   readonly>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="moyenne" class="col-form-label col-md-7 col-sm-7">Note moyenne NTM = (A + B + C +
                            D)/4 <span class="required">*</span></label>
                        <div class="col-md-2 col-sm-2 ">
                            <input id="moyenne" class="form-control" type="text" name="moyenne" placeholder="NM  /20"
                                   readonly>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="appreciation" class="col-form-label col-md-7 col-sm-7">Appréciation globale<span
                                class="required">*</span></label>
                        <div class="col-md-3 col-sm-3 ">
                            <select id="appreciation" name="appreciation" class="form-control" required>
                                <option value="">Votre choix</option>
                                @foreach($appreciations as $appreciation)
                                    <option value="{{$appreciation->id}}">{{$appreciation->designation}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="visa_decision" class="col-form-label col-md-7 col-sm-7">Visa / décision
                            d‘accréditation du gestionnaire<span class="required">*</span></label>
                        <div class="col-md-3 col-sm-3 ">
                            <select id="visa_decision" name="visa_decision" class="form-control" required>
                                <option value="">Votre choix</option>
                                @foreach($visaDecisions as  $visaDecision)
                                    <option value="{{$visaDecision->id}}">{{$visaDecision->designation}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="date_decision" class="col-form-label col-md-7 col-sm-7">Date de la décision<span
                                class="required">*</span></label>
                        <div class="col-md-3 col-sm-3 ">
                            <input id="date_decision" class="form-control" type="date" name="date_decision">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="niveau_accreditation" class="col-form-label col-md-7 col-sm-7">Nouveau niveau
                            d‘accréditation<span class="required">*</span></label>
                        <div class="col-md-3 col-sm-3 ">
                            <select id="niveau_accreditation" name="niveau_accreditation" class="form-control" required>
                                <option value="">Votre choix</option>
                                @foreach($niveauAccreditations as $niveauAccreditation)
                                    @if ($niveauAccreditation->id ===1 OR $niveauAccreditation->id === 2)
                                        <option
                                            value="{{$niveauAccreditation->id}}">{{$niveauAccreditation->designation}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="ancien_niveau_accreditation" class="col-form-label col-md-7 col-sm-7">Ancien niveau
                            d‘accréditation</label>
                        <div class="col-md-3 col-sm-3">
                            <input id="ancien_niveau_accreditation"
                                   value=" @if($accreditation->ref_ancien_accreditation === 1) Aucune accréditation
                            @elseif($accreditation->ref_ancien_accreditation === 2) Accréditation de niveau 1
                            @elseif($accreditation->ref_ancien_accreditation === 3) Accréditation de niveau 2
                            @elseif($accreditation->ref_ancien_accreditation === 4) Accréditation de niveau 3 @endif "
                                   class="form-control" type="text" name="ancien_niveau_accreditation" readonly>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="transition_accreditation" class="col-form-label col-md-7 col-sm-7">Transition
                            (Progression, Régression, Maintien) si applicable<span class="required">*</span></label>
                        <div class="col-md-3 col-sm-3">
                            <input id="transition_accreditation"
                                   value="@if($accreditation->transition_accreditation_id===1) Progression
                            @elseif($accreditation->transition_accreditation_id===2) Régression
                            @elseif($accreditation->transition_accreditation_id===3) Maintien @endif"
                                   class="form-control" type="text" name="transition_accreditation" readonly>

                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-7 col-sm-7">Observation (Commentaire du
                            gestionnaire)<span class="required">*</span></label>
                        <div class="col-md-3 col-sm-3 ">
                            <input id="observation" class="form-control" type="text" name="observation">
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <button class="btn btn-primary" type="submit" id="submit_accreditation">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Accreditation niveau 1  -->

@endsection

@push('stylesheets')

@endpush

@push('scripts')



@endpush
