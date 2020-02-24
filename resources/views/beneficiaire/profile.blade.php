@extends('layouts.master')
@section('title','Profile')
@section('content')
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Bénéficiaire<small>{{$compteUtilisateur->nom.' '.$compteUtilisateur->prenom}}</small></h2>
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
                                 title="Change the avatar">
                        </div>
                    </div>
                    <h3>{{$compteUtilisateur->nom.' '.$compteUtilisateur->prenom}}</h3>

                    <ul class="list-unstyled user_data">
                        <li>Pays/Ville :
                            <b>{{$dossierBeneficiaire->pays_nationalite->designation.', '.$dossierBeneficiaire->commune_ville->designation}}</b>
                        </li>

                        <li>

                            Sexe: <b>{{$compteUtilisateur->genre_sexe->designation}}</b>

                        </li>
                        <li>
                            Email : <b>{{$dossierBeneficiaire->email}}</b>
                        </li>
                        <li>

                            Téléphone : <b>{{$dossierBeneficiaire->telephone}}</b>

                        </li>

                    </ul>
                    <div class="row">
                        <div class="col-md-6 col-sm-6"><a class="btn btn-outline-primary btn-sm">Changer mot de
                                passe</a></div>
                        @if($dossierBeneficiaire->soumission_dossier_ok==="NON")
                            <div class="col-md-6 col-sm-6"><a class="btn btn-outline-warning btn-sm" onclick="event.preventDefault();
                        document.getElementById('submit-form-beneficaire').submit();">Soumettre le dossier</a></div>

                            <form id="submit-form-beneficaire"
                                  action="{{ route('dossier-beneficiaire.update', Auth::user()->id)  }}" method="POST"
                                  style="display: none;">
                                @method('PATCH')
                                @csrf
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

                                <!-- Informations PRCCE-->
                                <ul class="messages">
                                    <li>
                                        <img src="{{asset('images/inspection-96.png')}}" class="avatar" alt="Avatar">
                                        <div class="message_wrapper">
                                            <h4 class="heading">IDENTIFIANT PRCCE</h4>
                                            <blockquote
                                                class="message">{{$dossierBeneficiaire->identifiant_prcce}}</blockquote>
                                            <br/>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{asset('images/inspection-96.png')}}" class="avatar" alt="Avatar">
                                        <div class="message_wrapper">
                                            <h4 class="heading">DATE DE CREATION</h4>
                                            <blockquote
                                                class="message">{{$dossierBeneficiaire->created_at}}</blockquote>
                                            <br/>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{asset('images/inspection-96.png')}}" class="avatar" alt="Avatar">
                                        <div class="message_wrapper">
                                            <h4 class="heading">DATE DE MODIFICATION</h4>
                                            <blockquote
                                                class="message">{{$dossierBeneficiaire->updated_at}}</blockquote>
                                            <br/>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{asset('images/inspection-96.png')}}" class="avatar" alt="Avatar">
                                        <div class="message_wrapper">
                                            <h4 class="heading">SITUATION DU DOSSIER</h4>
                                            <blockquote
                                                class="message">{{$dossierBeneficiaire->situation_dossier ?? 'AUCUN'}}</blockquote>
                                            <br/>
                                        </div>
                                    </li>

                                </ul>
                                <!-- Informations PRCCE -->

                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="home-tab">

                                <!-- start recent activity -->
                                <ul class="messages">
                                    <li>
                                        <img src="{{asset('images/inspection-96.png')}}" class="avatar" alt="Avatar">
                                        <div class="message_wrapper">
                                            <h4 class="heading">NIU</h4>
                                            <blockquote class="message">{{$dossierBeneficiaire->niu}}</blockquote>
                                            <br/>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{asset('images/inspection-96.png')}}" class="avatar" alt="Avatar">
                                        <div class="message_wrapper">
                                            <h4 class="heading">RCCM</h4>
                                            <blockquote class="message">{{$dossierBeneficiaire->rccm}}</blockquote>
                                            <br/>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{asset('images/inspection-96.png')}}" class="avatar" alt="Avatar">
                                        <div class="message_wrapper">
                                            <h4 class="heading">SCIEN</h4>
                                            <blockquote class="message">{{$dossierBeneficiaire->scien}}</blockquote>
                                            <br/>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{asset('images/inspection-96.png')}}" class="avatar" alt="Avatar">
                                        <div class="message_wrapper">
                                            <h4 class="heading">SCIET</h4>
                                            <blockquote class="message">{{$dossierBeneficiaire->sciet}}</blockquote>
                                            <br/>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{asset('images/inspection-96.png')}}" class="avatar" alt="Avatar">
                                        <div class="message_wrapper">
                                            <h4 class="heading">NSS</h4>
                                            <blockquote class="message">{{$dossierBeneficiaire->nss}}</blockquote>
                                            <br/>
                                        </div>
                                    </li>

                                </ul>
                                <!-- end recent activity -->

                            </div>
                            <div role="tabpane3" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">

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
@endsection

@push('stylesheets')

@endpush

@push('scripts')

@endpush
