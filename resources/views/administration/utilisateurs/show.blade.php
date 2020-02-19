@extends('layouts.master')
@section('title','Profile')
@section('content')
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Prétataire<small>{{$utilisateur->nom.' '.$utilisateur->prenom}}</small></h2>
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
                    <h3>{{$utilisateur->nom.' '.$utilisateur->prenom}}</h3>

                    <ul class="list-unstyled user_data">
                        <li> Pays/Ville:
                            <b>{{$infoComplementaires->pays_nationalite->designation.', '.$communeVille->designation}}</b>
                        </li>
                        <li>
                            Sexe: <b>{{$infoComplementaires->genre_sexe->designation}}</b>
                        </li>
                        <li>
                            Email: <b>{{$infoComplementaires->compte_utilisateur->email}}</b>
                        </li>
                        <li>
                            Date de naissance: <b>{{$infoComplementaires->date_naissance}}</b>
                        </li>
                    </ul>

                    <a href="{{route('administration.utilisateurs.edit',$utilisateur)}}"
                       class="btn btn-outline-warning btn-block">Modifier</a>
                    <br/>
                </div>
                <div class="col-md-9 col-sm-9 ">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">

                            <li role="presentation" class=""><a href="#tab_content1" role="tab" id="profile-tab1"
                                                                data-toggle="tab" aria-expanded="false">Informations du
                                    compte</a>
                            </li>

                        </ul>
                        <div id="myTabContent" class="tab-content">

                            <div role="tabpanel" class="tab-pane active" id="tab_content1" aria-labelledby="home-tab">

                                <!-- start recent activity -->
                                <ul class="messages">
                                    <li>
                                        <img src="{{asset('images/inspection-96.png')}}" class="avatar" alt="Avatar">
                                        <div class="message_wrapper">
                                            <h4 class="heading">LOGIN</h4>
                                            <blockquote class="message">{{$utilisateur->login}}</blockquote>
                                            <br/>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{asset('images/inspection-96.png')}}" class="avatar" alt="Avatar">
                                        <div class="message_wrapper">
                                            <h4 class="heading">TYPE DE COMPTE</h4>
                                            <blockquote
                                                class="message">{{$typeCompte->type_compte->designation}}</blockquote>
                                            <br/>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{asset('images/inspection-96.png')}}" class="avatar" alt="Avatar">
                                        <div class="message_wrapper">
                                            <h4 class="heading">PROFIL COMPTE UTILISATEUR</h4>
                                            @foreach($typeCompte->profil_compte_users as $profil_compte_user)
                                                <blockquote
                                                    class="message">{{$profil_compte_user->libelle}}</blockquote>
                                            @endforeach
                                            <br/>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{asset('images/inspection-96.png')}}" class="avatar" alt="Avatar">
                                        <div class="message_wrapper">
                                            <h4 class="heading">PROFIL UTILISATEUR</h4>
                                            <blockquote class="message">XXXXXXXXXXXXXXXXXXXX</blockquote>
                                            <br/>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{asset('images/inspection-96.png')}}" class="avatar" alt="Avatar">
                                        <div class="message_wrapper">
                                            <h4 class="heading">DATE DE MODIFICATION</h4>
                                            <blockquote class="message">XXXXXXXXXXXXXXXXXXXX</blockquote>
                                            <br/>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{asset('images/inspection-96.png')}}" class="avatar" alt="Avatar">
                                        <div class="message_wrapper">
                                            <h4 class="heading">SITUATION DU DOSSIER</h4>
                                            <blockquote class="message">XXXXXXXXXXXXXXXXXXXX</blockquote>
                                            <br/>
                                        </div>
                                    </li>

                                </ul>
                                <!-- end recent activity -->

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
