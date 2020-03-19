@extends('layouts.master')
@section('title','Gestion des accréditations de niveau 2')
@section('content')
    <!-- Gestion des épreuves d’accréditation de niveau 2 -->
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Gestion des épreuves d’accréditation de niveau 2 – Certification technique</h2>
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
                                    <th>Domaine de la cartification</th>
                                    <th>Thématique(s)</th>
                                    <th>Date début</th>
                                    <th>Date fin</th>
                                    <th>Volume horaire</th>
                                    <th>Note Evaluateur /5</th>
                                    <th>Note Gestionnaire /5</th>
                                    <th>Date d'enregistrement</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($epreuveAccreditations as $epreuveAccreditation)
                                    <tr>
                                        <td>{{$epreuveAccreditation->domaine_cert_technique->designation}}</td>
                                        <td>{{$epreuveAccreditation->thematique}}</td>
                                        <td>{{$epreuveAccreditation->date_debut}}</td>
                                        <td>{{$epreuveAccreditation->date_fin}}</td>
                                        <td>{{$epreuveAccreditation->volume_horaire}}</td>
                                        <td>{{$epreuveAccreditation->note_evaluateur}}</td>
                                        <td>{{$epreuveAccreditation->note_finale}}</td>
                                        <td>{{$epreuveAccreditation->date_enregistrement}}</td>
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

    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Calcul automatique de la note moyenne d’accréditation</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form id="demo-form" action="{{route('gestionnaire.prestataire.store.accreditation_level_two',$id)}}"
                      method="POST" data-parsley-validate>
                    @csrf
                    <div class="item form-group">
                        <label for="date_enregistrement" class="col-form-label col-md-7 col-sm-7">Date d'enregistrement
                            (date du jour)<span class="required">*</span></label>
                        <div class="col-md-2 col-sm-2">
                            <input id="date_enregistrement" class="form-control" type="date" name="date_enregistrement">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="domaine_technique_certification" class="col-form-label col-md-7 col-sm-7">Domaine de
                            certification technique : [Formation, Charte fixant les règles du jeu,
                            Coaching/Accompagnement]<span class="required">*</span>:</label>
                        <div class="col-md-3 col-sm-3 ">
                            <select id="domaine_technique_certification" name="domaine_technique_certification"
                                    class="form-control" required>
                                <option value="">Votre choix</option>
                                @foreach($domainCertTechniques as $domainCertTechnique)
                                    <option
                                        value="{{$domainCertTechnique->id}}">{{$domainCertTechnique->designation}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="thematique" class="col-form-label col-md-7 col-sm-7">Thématiques (si applicable)
                            :</label>
                        <div class="col-md-3 col-sm-3 ">
                            <input id="thematique" class="form-control" type="text" name="thematique">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="date_debut" class="col-form-label col-md-7 col-sm-7">Date début<span
                                class="required">*</span></label>
                        <div class="col-md-3 col-sm-3 ">
                            <input id="date_debut" class="form-control" type="date" name="date_debut">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="date_fin" class="col-form-label col-md-7 col-sm-7">Date fin<span
                                class="required">*</span></label>
                        <div class="col-md-3 col-sm-3 ">
                            <input id="date_fin" class="form-control" type="date" name="date_fin">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="volume_horaire" class="col-form-label col-md-7 col-sm-7">Volume horaire (Nombre
                            d'heures)<span class="required">*</span></label>
                        <div class="col-md-3 col-sm-3 ">
                            <input id="volume_horaire" class="form-control" type="text" name="volume_horaire">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="note_provisoire_evaluateur" class="col-form-label col-md-7 col-sm-7">Notre
                            provisoire évalateur<span class="required">*</span></label>
                        <div class="col-md-2 col-sm-2 ">
                            <input id="note_provisoire_evaluateur" class="form-control" type="text"
                                   name="note_provisoire_evaluateur" placeholder=" /5">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="commentaire_evaluateur" class="col-form-label col-md-7 col-sm-7">Commentaire de
                            l'évaluateur</label>
                        <div class="col-md-3 col-sm-3 ">
                            <input id="commentaire_evaluateur" class="form-control" type="text"
                                   name="commentaire_evaluateur">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="note_finale_gestionnaire " class="col-form-label col-md-7 col-sm-7">Note finale du
                            Gestionnaire (par défaut, égale à la note provisoire):<span
                                class="required">*</span></label>
                        <div class="col-md-2 col-sm-2 ">
                            <input id="note_finale_gestionnaire" class="form-control" type="text"
                                   name="note_finale_gestionnaire" placeholder="/5">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="commentaire_gestionnaire " class="col-form-label col-md-7 col-sm-7">Commentaire du
                            gestionnaire:</label>
                        <div class="col-md-3 col-sm-3 ">
                            <input id="commentaire_gestionnaire" class="form-control" type="text"
                                   name="commentaire_gestionnaire">
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <button class="btn btn-primary" type="submit">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Gestion des épreuves d’accréditation de niveau 2 -->

    <!-- Gestion des accréditations de niveau 2 -->
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Gestion des accréditations de niveau 2 – Certification technique </h2>
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
                                    <th>Appréciation globale</th>
                                    <th>Niveau d‘accréditation</th>
                                    <th>Ancien niveau d‘accréditation</th>
                                    <th>Transition</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($accrediationNiveau2s as $accrediationNiveau2)
                                    <tr>
                                        <td>{{$accrediationNiveau2->date_decision_accreditation}}</td>
                                        <td>{{$accrediationNiveau2->visa_decision->designation}}</td>
                                        <td>{{$accrediationNiveau2->appreciation->designation}}</td>
                                        <td>{{$accrediationNiveau2->niveau_accreditation->designation}}</td>
                                        <td>@if($accrediationNiveau2->ref_ancien_accreditation === 1) Aucune
                                            accréditation
                                            @elseif($accrediationNiveau2->ref_ancien_accreditation === 2) Accréditation
                                                de
                                                niveau 1
                                            @elseif($accrediationNiveau2->ref_ancien_accreditation === 3) Accréditation
                                                de
                                                niveau 2
                                            @elseif($accrediationNiveau2->ref_ancien_accreditation === 4) Accréditation
                                                de
                                                niveau 3 @endif</td>
                                        <td>{{$accrediationNiveau2->transition_accreditation->designation}}</td>
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
    <!-- Gestion des accréditations de niveau 2 -->

    <!-- Calcul automatique de la note moyenne d’accréditation -->
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Calcul automatique de la note moyenne d’accréditation</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form id="demo-form" action="{{route('gestionnaire.prestataire.store.accreditation_level_two',$id)}}"
                      method="POST" data-parsley-validate>
                    @csrf
                    <div class="item form-group">
                        <label for="note_moyenne" class="col-form-label col-md-7 col-sm-7">Note moyenne NM = somme des
                            notes / nombre de notes)</label>
                        <div class="col-md-2 col-sm-2">
                            <input id="note_moyenne" class="form-control" type="text" name="note_moyenne"
                                   value="{{$noteMoyenne ?? ''}}" placeholder="NT  /20" readonly>
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
                            d’accréditation obtenu<span class="required">*</span></label>
                        <div class="col-md-3 col-sm-3 ">
                            <select id="niveau_accreditation" name="niveau_accreditation" class="form-control" required>
                                <option value="">Votre choix</option>
                                @foreach($niveauAccreditations as $niveauAccreditation)
                                    <option
                                        value="{{$niveauAccreditation->id}}">{{$niveauAccreditation->designation}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="ancien_niveau_accreditation" class="col-form-label col-md-7 col-sm-7">Ancien niveau
                            d‘accréditation</label>
                        <div class="col-md-3 col-sm-3">
                            <input id="ancien_niveau_accreditation" class="form-control" type="text"
                                   name="ancien_niveau_accreditation"
                                   value="{{$ancieniveauAccrediation->niveau_accreditation->designation}}" readonly>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="transition_accreditation" class="col-form-label col-md-7 col-sm-7">Transition
                            (Progression, Régression, Maintien) si applicable<span class="required">*</span></label>
                        <div class="col-md-3 col-sm-3">
                            <select id="transition_accreditation" name="transition_accreditation" class="form-control"
                                    required>
                                <option value="">Votre choix</option>
                                @foreach($transitionAccreditations as $transitionAccreditation)
                                    <option
                                        value="{{$transitionAccreditation->id}}">{{$transitionAccreditation->designation}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="observation" class="col-form-label col-md-7 col-sm-7">Observation (Commentaire du
                            gestionnaire)<span class="required">*</span></label>
                        <div class="col-md-3 col-sm-3 ">
                            <input id="observation" class="form-control" type="text" name="observation">
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <button class="btn btn-primary" type="submit">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Calcul automatique de la note moyenne d’accréditation  -->
@endsection

@push('stylesheets')

@endpush

@push('scripts')

@endpush
