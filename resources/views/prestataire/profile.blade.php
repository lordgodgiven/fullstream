@extends('layouts.master')
@section('title','Profile')
@section('content')
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Prétataire<small>{{$compteUtilisateur->nom.' '.$compteUtilisateur->prenom}}</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-3 col-sm-3  profile_left">
                    <div class="profile_img">
                        <div id="crop-avatar">
                            <!-- Current avatar -->
                            <img class="img-responsive avatar-view" src="{{asset('images/user.png')}}" alt="Avatar"
                                 title="Change the avatar" data-toggle="modal" data-target="#exampleModalCenter">
                        </div>
                    </div>
                    <h3>{{$compteUtilisateur->nom.' '.$compteUtilisateur->prenom}}</h3>

                    <ul class="list-unstyled user_data">
                        <li>Pays/Ville :
                            <b>{{ optional($infoComplementaires->pays_nationalite)->designation ?? 'PAYS'}}
                                , {{optional($communeVille)->designation ?? 'VILLE' }}</b>
                        </li>

                        <li>

                            Sexe: <b>{{$infoComplementaires->genre_sexe->designation}}</b>

                        </li>
                        <li>
                            Email : <b>{{$compteUtilisateur->email}}</b>
                        </li>
                        <li>
                            Date de naissance : <b>{{$infoComplementaires->date_naissance}}</b>
                        </li>
                        <li>
                            Téléphone : <b>{{$dossierPrestataire->telephone ?? '+242123456789'}}</b>
                        </li>

                    </ul>
                    <div class="row">
                        <div class="col-md-6 col-sm-6"><a class="btn btn-outline-primary btn-sm">Changer mot de
                                passe</a></div>
                        @if($dossierPrestataire->soumission_dossier_ok==="NON")
                            <div class="col-md-6 col-sm-6"><a class="btn btn-outline-warning btn-sm" onclick="event.preventDefault();
                        document.getElementById('submit-form-prestataire').submit();">Soumettre le dossier</a></div>

                            <form id="submit-form-prestataire"
                                  action="{{ route('dossier-prestataire.update', Auth::user()->id)  }}" method="POST"
                                  style="display: none;">
                                @csrf
                                @method('PATCH')
                            </form>
                        @endif
                    </div>


                    <br/>
                </div>
                <div class="col-md-9 col-sm-9 ">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                            <li role="presentation" class=""><a href="#tab_content1" role="tab" id="profile-tab"
                                                                data-toggle="tab" aria-expanded="false">Informations
                                    PRCCEII</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab2"
                                                                data-toggle="tab" aria-expanded="false">Informations
                                    Complementaires</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2"
                                                                data-toggle="tab" aria-expanded="false">Documents
                                    fournis</a>
                            </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="tab_content1" aria-labelledby="home-tab">

                                <!-- Information PRCCE -->
                                <ul class="messages">
                                    <li>
                                        <img src="{{asset('images/inspection-96.png')}}" class="avatar" alt="Avatar">
                                        <div class="message_wrapper">
                                            <h4 class="heading">N° IDENTIFIANT PRCCE II</h4>
                                            <blockquote
                                                class="message">{{$dossierPrestataire->identifiant_prcce ?? 'AUCUN'}}</blockquote>
                                            <br/>
                                        </div>
                                    </li>
                                    @if($decisionEligiblitePrestataire->avis_decision->designation === null)
                                        <li style="background-color: orange; color: white; border-radius: 5px 5px 5px 5px">
                                            <img src="{{asset('images/inspection-96.png')}}" class="avatar"
                                                 alt="Avatar">
                                            <div class="message_wrapper">
                                                <h4 class="heading">ELIGIBILITE</h4>
                                                <blockquote
                                                    class="message">{{$decisionEligiblitePrestataire->avis_decision->designation ?? ''}}
                                                    <i class="fa fa-calendar"></i> {{$decisionEligiblitePrestataire->avis_decision->created_at ?? ''}}
                                                </blockquote>
                                                <blockquote
                                                    class="message">{{$decisionEligiblitePrestataire->observation ?? ''}}</blockquote>
                                                <br/>
                                            </div>
                                        </li>
                                    @endif
                                    <li style="background-color: @if($decisionEligiblitePrestataire->avis_decision->designation === "Pas encore éligible") orange
                                    @elseif($decisionEligiblitePrestataire->avis_decision->designation === "Eligible") green
                                    @elseif($decisionEligiblitePrestataire->avis_decision->designation === "Non éligible") red @endif;
                                        color: white; border-radius: 5px 5px 5px 5px">
                                        <img src="{{asset('images/inspection-96.png')}}" class="avatar" alt="Avatar">
                                        <div class="message_wrapper">
                                            <h4 class="heading">ELIGIBILITE</h4>
                                            <blockquote
                                                class="message">{{$decisionEligiblitePrestataire->avis_decision->designation ?? ''   }}
                                                <i class="fa fa-calendar"></i> {{  $decisionEligiblitePrestataire->created_at ?? ''}}
                                            </blockquote>
                                            <blockquote
                                                class="message">{{$decisionEligiblitePrestataire->observation ?? ''}}</blockquote>
                                            <br/>
                                        </div>
                                    </li>

                                    <li>
                                        <img src="{{asset('images/inspection-96.png')}}" class="avatar" alt="Avatar">
                                        <div class="message_wrapper">
                                            <h4 class="heading">NIVEAU ACCREDITATION</h4>
                                            <blockquote
                                                class="message">{{$accreditation->niveau_accreditation->designation}}</blockquote>
                                            <br/>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{asset('images/inspection-96.png')}}" class="avatar" alt="Avatar">
                                        <div class="message_wrapper">
                                            <h4 class="heading">DATE DE CREATION</h4>
                                            <blockquote class="message">{{$dossierPrestataire->created_at}}</blockquote>
                                            <br/>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{asset('images/inspection-96.png')}}" class="avatar" alt="Avatar">
                                        <div class="message_wrapper">
                                            <h4 class="heading">DATE DE MODIFICATION</h4>
                                            <blockquote class="message">{{$dossierPrestataire->updated_at}}</blockquote>
                                            <br/>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{asset('images/inspection-96.png')}}" class="avatar" alt="Avatar">
                                        <div class="message_wrapper">
                                            <h4 class="heading">SITUATION DU DOSSIER</h4>
                                            <blockquote
                                                class="message">{{$dossierPrestataire->situation_dossier ?? 'AUCUN'}}</blockquote>
                                            <br/>
                                        </div>
                                    </li>

                                </ul>
                                <!-- Information PRCCE -->

                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="home-tab">

                                <!-- Informations Complementaires -->
                                <ul class="messages">
                                    <li>
                                        <img src="{{asset('images/inspection-96.png')}}" class="avatar" alt="Avatar">
                                        <div class="message_wrapper">
                                            <h4 class="heading">DISPONIBILITE</h4>
                                            <blockquote
                                                class="message">{{$dossierPrestataire->disponibilite->designation ?? ''}}</blockquote>
                                            <br/>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{asset('images/inspection-96.png')}}" class="avatar" alt="Avatar">
                                        <div class="message_wrapper">
                                            <h4 class="heading">ZONE INTERVENTION</h4>
                                            <blockquote
                                                class="message">{{$dossierPrestataire->zone_intervention->designation}}</blockquote>
                                            <br/>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{asset('images/inspection-96.png')}}" class="avatar" alt="Avatar">
                                        <div class="message_wrapper">
                                            <h4 class="heading">TYPE EXPERT</h4>
                                            <blockquote
                                                class="message">{{$dossierPrestataire->type_expert->designation ?? ''}}</blockquote>
                                            <br/>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{asset('images/inspection-96.png')}}" class="avatar" alt="Avatar">
                                        <div class="message_wrapper">
                                            <h4 class="heading">TYPE PRESTATIONS DISPENSEES</h4>
                                            @foreach($dossierPrestataire->type_prestation_dispensees as $type_prestation_dispensee)
                                                <blockquote
                                                    class="message">{{$type_prestation_dispensee->famille_intervention->designation ?? ''}}
                                                    en {{$type_prestation_dispensee->sous_categorie->designation ?? ''}}</blockquote>
                                            @endforeach
                                            <br/>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{asset('images/inspection-96.png')}}" class="avatar" alt="Avatar">
                                        <div class="message_wrapper">
                                            <h4 class="heading">DATE DE CREATION</h4>
                                            <blockquote class="message">{{$dossierPrestataire->created_at}}</blockquote>
                                            <br/>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{asset('images/inspection-96.png')}}" class="avatar" alt="Avatar">
                                        <div class="message_wrapper">
                                            <h4 class="heading">DATE DE MODIFICATION</h4>
                                            <blockquote class="message">{{$dossierPrestataire->updated_at}}</blockquote>
                                            <br/>
                                        </div>
                                    </li>

                                </ul>
                                <!-- Informations Complementaires -->

                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">

                                <!-- Documents fournis -->
                                <table class="data table table-striped no-margin">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom du document</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($filenames as $filename)
                                        <tr>
                                            <td>{{$filename->id}}</td>
                                            <td><a href="/documents/{{$filename->filename}}"
                                                   target="_blank"><i
                                                        class="fa fa-paperclip"></i> {{$filename->filename}}</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <!-- Documents fournis -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="avatarUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Mise à jour photo de profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="photo">Votre photo</label>
                            <input type="file" class="form-control-file" id="photo">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('stylesheets')

@endpush

@push('scripts')

@endpush
