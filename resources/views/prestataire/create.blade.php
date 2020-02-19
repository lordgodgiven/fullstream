@extends('layouts.master')
@section('title','Formulaire d\'inscription')
@section('content')
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Note d'information</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                Add content to the page ...
            </div>
        </div>
    </div>

    <!-- sous formulaire etat civil -->
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Personne physique</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" method="POST" action="{{route('individu.store')}}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Civilite
                            : <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="civilite" id="civilite" class="form-control" readonly="">
                                <option value="">Votre choix</option>
                                @foreach($civilites as $civilite)
                                    <option
                                        value="{{$civilite->id}}" {{$civilite->id==$utilisateur->civilite->id ? 'selected':''}} >{{$civilite->designation}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Sexe
                            : <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="sexe" id="sexe" class="form-control" readonly="">
                                <option value="">Votre choix</option>
                                @foreach($genreSexes as $sexe)
                                    <option
                                        value="{{$sexe->id}}" {{$sexe->id==$utilisateur->genre_sexe->id ? 'selected':''}} >{{$sexe->designation}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">identifiant PRCCEII
                            :
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="identifiant_prcceii" name="identifiant_prcceii"
                                   class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">NIU:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="niu" class="form-control @error('niu') is-invalid @enderror"
                                   name="niu">
                        </div>
                        @error('niu')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">NSS
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="nss" name="nss"
                                   class="form-control @error('nss') is-invalid @enderror">
                        </div>
                        @error('nss')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nom
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="nom" value="{{$utilisateur->nom}}" readonly class="form-control">
                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Prénom: <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="prenom" value="{{$utilisateur->prenom}}" readonly
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date de naissance:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" name="date_naissance"
                                   class="form-control @error('date_naissance') is-invalid @enderror">
                        </div>
                        @error('date_naissance')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nationalité: <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="nationalite" id="nationalite"
                                    class="form-control @error('nationalite') is-invalid @enderror">
                                <option value="">Votre choix</option>
                                @foreach($nationalites as $nationalite)
                                    <option value="{{$nationalite->id}}"
                                            @if(old('nationalite')==$nationalite->id) selected="selected" @endif>{{$nationalite->designation}}</option>
                                @endforeach
                            </select>
                            @error('nationalite')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Photo:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="photo" id="photo" required="required"
                                   class="form-control ">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nivau de
                            qualification: <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="niveau_qualification" id="ville"
                                    class="form-control @error('niveau_qualification') is-invalid @enderror">
                                <option value="">Votre choix</option>
                                @foreach($niveauQualifications as $niveauQualification)
                                    <option value="{{$niveauQualification->id}}"
                                            @if(old('niveau_qualification')==$niveauQualification->id) selected="selected" @endif>{{$niveauQualification->designation}}</option>
                                @endforeach
                            </select>
                            @error('niveau_qualification')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Situation
                            familliale: <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="situation_familliale" id="ville"
                                    class="form-control @error('situation_familliale') is-invalid @enderror">
                                <option value="">Votre choix</option>
                                @foreach($situationFamilliales as $situationFamilliale)
                                    <option value="{{$situationFamilliale->id}}"
                                            @if(old('situation_familliale')==$situationFamilliale->id) selected="selected" @endif>{{$situationFamilliale->designation}}</option>
                                @endforeach
                            </select>
                            @error('situation_familliale')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
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
    <!-- /sous formulaire etat civil-->

    <!-- sous formulaire identitté -->
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Identité</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" method="POST"
                      action="{{route('dossier-prestataire.store')}}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">N°
                            d'indentification roster PRCCEII :
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="identifiant_roster_prcceii" name="identifiant_roster_prcceii"
                                   class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">NAEMA:
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="naema" class="form-control" name="naema"
                                   readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">NOPEMA
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="nopema" name="nopema" class="form-control"
                                   readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Numéro
                            d'identification Unique(NIU) <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="niu" class="form-control @error('niu') is-invalid @enderror"
                                   value="{{$individu->niu ?? ''}}" readonly>
                        </div>
                        @error('niu')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nom: <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="nom" class="form-control" value="{{$utilisateur->nom}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nom de jeune fille:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="nom_jeune_fille" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nationalité:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="nationalite" readonly class="form-control"
                                   value="{{$individu->pays_nationalite->designation ?? ''}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Adresse personnelle:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="adresse_personnelle" id="adresse_personnelle"
                                   class="form-control @error('adresse_personnelle') is-invalid @enderror">
                        </div>
                        @error('adresse_personnelle')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Pays de résidence
                            actuelle: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="pays" id="pays" class="form-control @error('pays') is-invalid @enderror">
                                <option value="">Votre choix</option>
                                @foreach($listePays as $pays)
                                    <option value="{{$pays->id}}"
                                            @if(old('pays')==$pays->id) selected="selected" @endif>{{$pays->designation}}</option>
                                @endforeach
                            </select>
                            @error('pays')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Département de
                            résidence actuelle: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="departement" id="departement"
                                    class="form-control @error('departement') is-invalid @enderror">
                                <option value="">Votre choix</option>
                                @foreach($departements as $departement)
                                    <option value="{{$departement->id}}"
                                            @if(old('departement')==$departement->id) selected="selected" @endif>{{$departement->designation}}</option>
                                @endforeach
                            </select>
                            @error('departement')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Ville: <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="ville" id="ville" class="form-control @error('ville') is-invalid @enderror">
                                <option value="">Votre choix</option>
                                @foreach($villes as $ville)
                                    <option value="{{$ville->id}}"
                                            @if(old('ville')==$ville->id) selected="selected" @endif>{{$ville->designation}}</option>
                                @endforeach
                            </select>
                            @error('ville')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">E-mail:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="e-mail" id="e-mail" required="required"
                                   value="{{$email->email ?? ''}}"
                                   class="form-control ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Numéro de téléphone
                            (précisez l'indicatif): <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2">
                            <input type="text" name="indicatif_telephonique" id="telephone" placeholder="+242"
                                   class="form-control @error('indicatif_telephonique') is-invalid @enderror">
                        </div>
                        @error('indicatif_telephonique')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="col-md-4 col-sm-4">
                            <input type="text" name="numero_telephone" id="telephone" required="required"
                                   placeholder="055004000"
                                   class="form-control @error('numero_telephone') is-invalid @enderror">
                        </div>
                        @error('numero_telephone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date de naissance:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="date_naissance" id="date_naissance"
                                   class="form-control " value="{{$individu->date_naissance ?? ''}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Disponibilité: <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="disponibilite" id="disponibilite"
                                    class="form-control @error('disponiblite') is-invalid @enderror">
                                <option value="">Votre choix</option>
                                @foreach($disponibilites as $disponibilite)
                                    <option value="{{$disponibilite->id}}"
                                            @if(old('disponibilite')==$disponibilite->id) selected="selected" @endif>{{$disponibilite->designation}}</option>
                                @endforeach
                            </select>
                            @error('disponibilite')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Zone d'intervention:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="zone_intervention" id="zone_intervention"
                                    class="form-control @error('zone_intervention') is-invalid @enderror">
                                <option value="">Votre choix</option>
                                @foreach($zoneInterventions as $zoneIntervention)
                                    <option value="{{$zoneIntervention->id}}"
                                            @if(old('zone_intervention')==$zoneIntervention->id) selected="selected" @endif>{{$zoneIntervention->designation}}</option>
                                @endforeach
                            </select>
                            @error('zone_intervention')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Type expert: <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="type_expert" id="type_expert"
                                    class="form-control @error('type_expert') is-invalid @enderror">
                                <option value="">Votre choix</option>
                                @foreach($typeExperts as $typeExpert)
                                    <option value="{{$typeExpert->id}}"
                                            @if(old('type_expert')==$typeExpert->id) selected="selected" @endif>{{$typeExpert->designation}}</option>
                                @endforeach
                            </select>
                            @error('type_expert')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Situation du
                            dossier:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="situation_dossier" id="situation_dossier"
                                   class="form-control " readonly>
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
    <!-- /sous formulaire identité-->

    <!-- Types de prestations dispensées (Chaîne de valeur) -->
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <form class="form-horizontal form-label-left" method="POST" action="{{route('type-prest-dis.store')}}">
                @csrf
                <div class="x_title">
                    <h2>Types de prestations dispensées (Chaîne de valeur)</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Famille d'interevention</th>
                            <th>Sous-catégorie</th>
                            <th colspan="2" class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($typePrestationRetenues as $typePrestationRetenue)
                            <tr>
                                <td>{{$typePrestationRetenue->famille_intervention->designation}}</td>
                                <td>{{$typePrestationRetenue->sous_categorie->designation}}</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-outline-warning btn-sm" title="Modifier"> <i
                                            class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-outline-danger btn-sm" title="Supprimer"><i
                                            class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="ln_solid"></div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Famille
                            d‘intervention:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="famille_intervention" id="famille_intervention"
                                    class="form-control @error('famille_intervention') is-invalid @enderror">
                                <option value="">Votre choix</option>
                                @foreach($familleInterventions as $familleIntervention)
                                    <option value="{{$familleIntervention->id}}"
                                            @if(old('famille_intervention')==$familleIntervention->id) selected="selected" @endif>{{$familleIntervention->designation}}</option>
                                @endforeach
                            </select>
                            @error('famille_intervention')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Sous-catégorie:
                            <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="sous_categorie" id="sous_categorie"
                                    class="form-control @error('sous-categorie') is-invalid @enderror">
                                <option value="">Votre choix</option>

                            </select>
                            @error('sous-categorie')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button class="btn btn-primary" type="reset">Effacer</button>
                            <button type="submit" class="btn btn-success">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /Types de prestations dispensées (Chaîne de valeur) -->

    <!-- Employeur(s) actuel(s) (si applicable) -->
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <form class="form-horizontal form-label-left" method="POST" action="{{route('employeur.store')}}">
                @csrf
                <div class="x_title">
                    <h2>Employeur(s) actuel(s) (si applicable)</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Nom employeur</th>
                            <th>Type employeur</th>
                            <th>Pays</th>
                            <th>Années d'ancienneté</th>
                            <th>Missions principales</th>
                            <th colspan="2" class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employeurs as $employeur)
                            <tr>
                                <td>{{$employeur->nom}}</td>
                                <td>{{$employeur->type_employeur->designation}}</td>
                                <td>{{$employeur->pays_nationalite->designation}}</td>
                                <td>{{$employeur->anciennete}}</td>
                                <td>{{$employeur->missions_principales}}</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-outline-warning btn-sm" title="Modifier"> <i
                                            class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-outline-danger btn-sm" title="Supprimer"><i
                                            class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="ln_solid"></div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nom employeur*:
                            <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="nom_employeur" id="nom_employeur" required="required"
                                   class="form-control @error('nom_employeur') is-invalid @enderror">
                        </div>
                        @error('nom_employeur')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Type employeur:
                            <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="type_employeur" id="type_employeur"
                                    class="form-control @error('type_employeur') is-invalid @enderror">
                                <option value="">Votre choix</option>
                                @foreach($typeEmployeurs as $typeEmployeur)
                                    <option value="{{$typeEmployeur->id}}"
                                            @if(old('type_employeur')==$typeEmployeur->id) selected="selected" @endif>{{$typeEmployeur->designation}}</option>
                                @endforeach
                            </select>
                            @error('type_employeur')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Pays: <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="pays" id="pays" class="form-control @error('pays') is-invalid @enderror">
                                <option value="">Votre choix</option>
                                @foreach($listePays as $pays)
                                    <option value="{{$pays->id}}"
                                            @if(old('pays')==$pays->id) selected="selected" @endif>{{$pays->designation}}</option>
                                @endforeach
                            </select>
                            @error('pays')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Années d'ancienneté:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="annees_anciennete" id="e-mail" required="required"
                                   class="form-control @error('annees_anciennete') is-invalid @enderror">
                            @error('annees_anciennete')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Missions principales: <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="missions_principales" id="missions_principales" required="required"
                                   class="form-control @error('missions_principales') is-invalid @enderror">
                            @error('missions_principales')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button class="btn btn-primary" type="reset">Effacer</button>
                            <button type="submit" class="btn btn-success">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /Employeur(s) actuel(s) (si applicable) -->

    <!-- Maîtrise des langues (Compétences linguistiques) -->
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <form class="form-horizontal form-label-left" method="POST" action="{{route('compet-ling-expert.store')}}">
                @csrf
                <div class="x_title">
                    <h2>Maîtrise des langues (Compétences linguistiques)</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Langue</th>
                            <th>Dégré de maîtres</th>
                            <th>Code dégré de maîtrise</th>
                            <th colspan="2" class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($competenceLinguistiqueExperts as $competenceLinguistiqueExpert)
                            <tr>
                                <td>{{$competenceLinguistiqueExpert->langue->designation}}</td>
                                <td>{{$competenceLinguistiqueExpert->niveau_maitrise->designation}}</td>
                                <td>{{$competenceLinguistiqueExpert->code_degre_maitrise}}</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-outline-warning btn-sm" title="Modifier"> <i
                                            class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-outline-danger btn-sm" title="Supprimer"><i
                                            class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="ln_solid"></div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Langue: <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="langue" id="type_employeur"
                                    class="form-control @error('langue') is-invalid @enderror">
                                <option value="">Votre choix</option>
                                @foreach($langues as $langue)
                                    <option value="{{$langue->id}}"
                                            @if(old('langue')==$langue->id) selected="selected" @endif>{{$langue->designation}}</option>
                                @endforeach
                            </select>
                            @error('langue')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Degré de maîtrise:
                            <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="niveau_maitrise" id="niveau_maitrise"
                                    class="form-control @error('niveau_maitrise') is-invalid @enderror">
                                <option value="">Votre choix</option>
                                @foreach($niveauMaitrises as $niveauMaitrise)
                                    <option value="{{$niveauMaitrise->id}}"
                                            @if(old('niveau_maitrise')==$niveauMaitrise->id) selected="selected" @endif>{{$niveauMaitrise->designation}}</option>
                                @endforeach
                            </select>
                            @error('niveau_maitrise')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button class="btn btn-primary" type="reset">Effacer</button>
                            <button type="submit" class="btn btn-success">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /Maîtrise des langues (Compétences linguistiques) -->

    <!-- Expériences (tableau types d'expériences pour chaque famille d'intervention avec au moins une année d'expérience) -->
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <form class="form-horizontal form-label-left" method="POST"
                  action="{{route('exp-chaine-valeur-exps.store')}}">
                @csrf
                <div class="x_title">
                    <h2>Expériences (tableau types d'expériences pour chaque famille d'intervention avec au moins une
                        année
                        d'expérience)</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Famille d'intervention</th>
                            <th>Sous-catégorie</th>
                            <th>Année d'expérience</th>
                            <th colspan="2" class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($experienceChaineValeurExperts as $experienceChaineValeurExpert)
                            <tr>
                                <td>{{$experienceChaineValeurExpert->famille_intervention->designation}}</td>
                                <td>{{$experienceChaineValeurExpert->sous_categorie->designation}}</td>
                                <td>{{$experienceChaineValeurExpert->annees_experience}}</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-outline-warning btn-sm" title="Modifier"> <i
                                            class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-outline-danger btn-sm" title="Supprimer"><i
                                            class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="ln_solid"></div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Famille
                            d‘intervention:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="famille_intervention" id="type_employeur"
                                    class="form-control @error('famille_intervention') is-invalid @enderror">
                                <option value="">Votre choix</option>
                                @foreach($familleInterventions as $familleIntervention)
                                    <option value="{{$familleIntervention->id}}"
                                            @if(old('famille_intervention')==$familleIntervention->id) selected="selected" @endif>{{$familleIntervention->designation}}</option>
                                @endforeach
                            </select>
                            @error('famille_intervention')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Sous-categorie:
                            <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="sous_categorie" id="pays"
                                    class="form-control @error('sous_categorie') is-invalid @enderror">
                                <option value="">Votre choix</option>
                                @foreach($sousCategories as $sousCategorie)
                                    <option value="{{$sousCategorie->id}}"
                                            @if(old('sous_categorie')==$sousCategorie->id) selected="selected" @endif>{{$sousCategorie->designation}}</option>
                                @endforeach
                            </select>
                            @error('sous_categorie')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Année(s)
                            d‘expérience:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="annees_experience" id="annees_experience" required="required"
                                   class="form-control @error('annees_experience') is-invalid @enderror">
                        </div>
                        @error('annees_experience')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button class="btn btn-primary" type="reset">Effacer</button>
                            <button type="submit" class="btn btn-success">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /Expériences (tableau types d'expériences pour chaque famille d'intervention avec au moins une année d'expérience) -->

    <!-- Références clients -->
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <form class="form-horizontal form-label-left" method="POST" action="{{route('ref-client-exps.store')}}">
                @csrf
                <div class="x_title">
                    <h2>Références clients</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Client</th>
                            <th>Téléphone</th>
                            <th>E-mail</th>
                            <th>Type de prestation</th>
                            <th>Durée la prestation (H/J)</th>
                            <th colspan="2" class="text-center">Période de la préstation</th>
                            <th colspan="2" class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($referenceClients as $referenceClient)
                            <tr>
                                <td>{{$referenceClient->nom}}</td>
                                <td>{{$referenceClient->telephone}}</td>
                                <td>{{$referenceClient->email}}</td>
                                <td>{{$referenceClient->type_prestation}}</td>
                                <td>{{$referenceClient->duree}}</td>
                                <td>{{$referenceClient->date_debut}}</td>
                                <td>{{$referenceClient->date_fin}}</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-outline-warning btn-sm" title="Modifier"> <i
                                            class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-outline-danger btn-sm" title="Supprimer"><i
                                            class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="ln_solid"></div>

                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nom / prénom ou
                            raison
                            sociale: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="nom_prenom_raison_sociale" id="e-mail" required="required"
                                   class="form-control @error('nom_prenom_raison_sociale') is-invalid @enderror">
                            @error('nom_prenom_raison_sociale')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Numéro de téléphone
                            (précisez l'indicatif): <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2">
                            <input type="text" name="indicatif_telephonique" id="telephone" placeholder="+242"
                                   class="form-control @error('indicatif_telephonique') is-invalid @enderror">
                        </div>
                        @error('indicatif_telephonique')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="col-md-4 col-sm-4">
                            <input type="text" name="numero_telephone" id="telephone" required="required"
                                   placeholder="055004000"
                                   class="form-control @error('numero_telephone') is-invalid @enderror">
                        </div>
                        @error('numero_telephone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">E-mail: <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="email" id="email" required="required"
                                   class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Type de prestation:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="type_prestation" id="type_prestation" required="required"
                                   class="form-control @error('type_prestation') is-invalid @enderror">
                            @error('type_prestation')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Durée de la
                            prestation:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="duree_prestation" id="e-mail" required="required"
                                   class="form-control @error('duree_prestation') is-invalid @enderror">
                            @error('duree_prestation')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Période de la
                            prestation: <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 ">
                            <input type="date" name="du" id="du" required="required"
                                   class="form-control @error('du') is-invalid @enderror">
                            @error('du')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-3 col-sm-3 ">
                            <input type="date" name="au" id="du" required="required"
                                   class="form-control @error('au') is-invalid @enderror">
                            @error('au')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button class="btn btn-primary" type="reset">Effacer</button>
                            <button type="submit" class="btn btn-success">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Références clients -->

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
                <form class="form-horizontal form-label-left" method="POST"
                      action="{{route('dossier-prestataire.store')}}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Motivation: <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                       <textarea class="form-control @error('motivations') is-invalid @enderror" cols="30"
                                 name="motivations"
                                 rows="3">
                                    {{ old('motivations') }}
                       </textarea>
                            @error('motivations')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
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
    <!-- /Motivations -->

    <!-- /Pièces à fournir -->
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Pièces à fournir</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Pièces à fournir pour
                        l’éligibilité des prestataires: <span
                            class="required">*</span>
                    </label>

                    <div class="col-md-6 col-sm-6 ">
                        <form method="POST" action="{{url('document/upload/store')}}" enctype="multipart/form-data"
                              class="dropzone dropzone form-horizontal form-label-left" id="dropzone">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Pièces à fournir -->
@endsection

@push('stylesheets')

@endpush

@push('scripts')

@endpush

