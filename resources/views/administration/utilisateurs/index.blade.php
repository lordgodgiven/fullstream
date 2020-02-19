@extends('layouts.master')
@section('title','Liste de utilisateurs')
@section('content')

    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Utilisateurs</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a href="{{route('administration.utilisateurs.create')}}" title="Ajouter un utilisateur"><i
                                class="fa fa-2x fa-user-plus"></i></a>
                    </li>
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                                    <th>#</th>
                                    <th>Nom(s)</th>
                                    <th>Prénom(s)</th>
                                    <th>Identifiant</th>
                                    <th>E-mail</th>
                                    <th>Profil compte utilisateur</th>
                                    <th>Profil utilisateur</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>


                                <tbody>
                                @foreach($utilisateurs as $utilisateur)
                                    <tr>
                                        <td>{{$utilisateur->id}}</td>
                                        <td>{{$utilisateur->nom}}</td>
                                        <td>{{$utilisateur->prenom}}</td>
                                        <td>{{$utilisateur->login}}</td>
                                        <td>{{$utilisateur->email}}</td>
                                        @foreach($utilisateur->profil_compte_users as $profil_compte_user)
                                            <td>{{$profil_compte_user->libelle}}</td>
                                        @endforeach
                                        @foreach($utilisateur->profil_compte_users as $profil_compte_user)
                                            <td>{{$profil_compte_user->profil_utilisateur->libelle}}</td>
                                        @endforeach
                                        <td class="text-center">
                                            <a href="{{route('administration.utilisateurs.edit',$utilisateur)}}"
                                               class="btn btn-outline-warning btn-sm" title="Modifier"> <i
                                                    class="fa fa-edit"></i></a>
                                            <a href="" class="btn btn-outline-danger btn-sm" title="Supprimer"><i
                                                    class="fa fa-trash"></i></a>
                                            <a href="{{route('administration.utilisateurs.show',$utilisateur)}}"
                                               class="btn btn-outline-danger btn-sm" title="Consulter"><i
                                                    class="fa fa-eye"></i></a>
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
