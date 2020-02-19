@extends('layouts.master')
@section('title','Formulaire')
@section('content')
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Création utilisateur</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br/>
                <form action="{{route('administration.utilisateurs.store')}}" method="POST" data-parsley-validate
                      class="form-horizontal form-label-left">
                    @csrf
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nom">Nom <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="nom" name="nom"
                                   class="form-control @error('nom') is-invalid @enderror">
                        </div>
                        @error('nom')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="prenom">Prénom<span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="prenom" name="prenom"
                                   class="form-control @error('prenom') is-invalid @enderror">
                        </div>
                        @error('prenom')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="prenom">Email<span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="email" name="email"
                                   class="form-control @error('email') is-invalid @enderror">
                        </div>
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="item form-group">
                        <label for="identifiant"
                               class="col-form-label col-md-3 col-sm-3 label-align">Identifiant</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input id="identifiant" class="form-control @error('identifiant') is-invalid @enderror"
                                   type="text" name="identifiant">
                        </div>
                        @error('identifiant')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Mot de
                            passe</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input id="mot_passe" class="form-control @error('mot_passe') is-invalid @enderror"
                                   type="password" name="mot_passe">
                        </div>
                        @error('mot_passe')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Confirmez le mot
                            de passe</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input id="mot_passe_confirm"
                                   class="form-control @error('mot_passe_confirm') is-invalid @enderror" type="password"
                                   name="mot_passe_confirm">
                        </div>
                        @error('mot_passe_confirm')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Type de
                            compte</label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="type_compte" id="pays"
                                    class="form-control @error('type_compte') is-invalid @enderror">
                                <option value="">Votre choix</option>
                                @foreach($typeComptes as $typeCompte)
                                    <option value="{{$typeCompte->id}}"
                                            @if(old('typeCompte')==$typeCompte->id) selected="selected" @endif>{{$typeCompte->designation}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('type_compte')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Profil compte
                            utilisateur</label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="profil_compte_utilisateur" id="profil_compte_utilisateur"
                                    class="form-control @error('profil_compte_utilisateur') is-invalid @enderror">
                                <option value="">Votre choix</option>
                                @foreach($profilCompteUtilisateurs as $profilCompteUtilisateur)
                                    <option value="{{$profilCompteUtilisateur->id}}"
                                            @if(old('profil_compte_utilisateur')==$profilCompteUtilisateur->id) selected="selected" @endif>{{$profilCompteUtilisateur->libelle}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('profil_compte_utilisateur')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Profil
                            utilisateur</label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="profil_utilisateur" id="profil_utilisateur"
                                    class="form-control @error('profil_utilisateur') is-invalid @enderror">
                                <option value="">Votre choix</option>
                                @foreach($profilUtilisateurs as $profilUtilisateur)
                                    <option value="{{$profilUtilisateur->id}}"
                                            @if(old('profil_utilisateur')==$profilUtilisateur->id) selected="selected" @endif>{{$profilUtilisateur->libelle}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('profil_utilisateur')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="item form-group">
                        <label for=module" class="col-form-label col-md-3 col-sm-3 label-align">Module</label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="module" id="module"
                                    class="form-control @error('module') is-invalid @enderror">
                                <option value="">Votre choix</option>
                                @foreach($modules as $module)
                                    <option value="{{$module->id}}"
                                            @if(old('module')==$module->id) selected="selected" @endif>{{$module->libelle}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('module')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="item form-group">
                        <label for="middle-name"
                               class="col-form-label col-md-3 col-sm-3 label-align">Fonctionnalite</label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="fonctionnalite[]" id="fonctionnalite"
                                    class="form-control @error('fonctionnalite') is-invalid @enderror"
                                    multiple="multiple">
                                <option value="">Votre choix</option>
                            </select>
                        </div>
                        @error('fonctionnalite')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="item form-group">
                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Droit</label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="droit" id="droit"
                                    class="form-control @error('droit') is-invalid @enderror">
                                <option value="">Votre choix</option>
                                @foreach($droits as $droit)
                                    <option value="{{$droit->id}}"
                                            @if(old('droit')==$droit->id) selected="selected" @endif>{{$droit->libelle}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('droit')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Civilite</label>
                        <div class="col-md-3 col-sm-3 ">
                            <select name="civilite" id="pays"
                                    class="form-control @error('civilite') is-invalid @enderror">
                                <option value="">Votre choix</option>
                                @foreach($civilites as $civilite)
                                    <option value="{{$civilite->id}}"
                                            @if(old('civilite')==$civilite->id) selected="selected" @endif>{{$civilite->designation}}</option>
                                @endforeach
                            </select>
                            @error('civilite')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <label class="col-form-label col-md-1 col-sm-1 label-align">Sexe</label>
                        <div class="col-md-2 col-sm-2 ">
                            <select name="sexe" id="sexe"
                                    class="form-control @error('sexe') is-invalid @enderror">
                                <option value="">Votre choix</option>
                                @foreach($sexes as $sexe)
                                    <option value="{{$sexe->id}}"
                                            @if(old('sexe')==$sexe->id) selected="selected" @endif>{{$sexe->designation}}</option>
                                @endforeach
                            </select>
                            @error('sexe')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button class="btn btn-primary" type="reset">Annuler</button>
                            <button type="submit" class="btn btn-success">Enregister</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection

@push('stylesheets')

@endpush

@push('scripts')
    <script type="text/javascript">

            @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch (type) {
            case 'info':
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-bottom-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                toastr.info("{{ Session::get('message') }}");

                break;

            case 'warning':
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-bottom-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-bottom-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                toastr.success("{{ Session::get('message') }}");

                break;

            case 'error':
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-bottom-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif
    </script>
@endpush

