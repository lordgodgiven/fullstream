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
                <p>
                    Avant de commencer votre inscription en ligne, merci de préparer les éléments suivants :
                <ul>
                    <li>Un document présentant vos références client de moins de 5 ans ;</li>
                    <li>Un document présentant vos domaines de compétences ;</li>
                    <li>Un bref exposé de vos motivations à candidater pour le PRCCE II (maximum de 300 mots acceptés)
                        .
                    </li>
                </ul>
                NB: Vous pouvez remplir votre dossier à votre rytme et soumettre le dossier à votre convenance en allant
                dans profil -> soumettre mon dossier.<br>
                </p>
            </div>
        </div>
    </div>

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
                      action="{{route('dossier-beneficiaire.store')}}">
                    @csrf

                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Identifiant PRCCEII
                            :
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="identifiant_prcce" name="identifiant_prcce"
                                   value="{{$identifiant_prcce}}"
                                   class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Dénomination ou
                            raison sociale
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="raison_sociale" name="raison_sociale" class="form-control"
                                   required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Sigle ou abéviation
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="abreviation" name="abreviation" class="form-control"
                                   required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nom
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="nom" value="{{$utilisateur->nom ?? ''}}" readonly
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Prénom: <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="prenom" value="{{$utilisateur->prenom ?? ''}}" readonly
                                   class="form-control ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">RCCM:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="rccm" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">NIU:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="niu" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">SCIEN:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="scien" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">SCIET:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="sciet" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Numéro de la
                            patente:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="numero_patente" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">NSS:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="nss" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Autre identifiant
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="autre_identifiant" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Secteur juridique:
                            <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="secteur_juridique" id="secteur_juridique"
                                    class="form-control @error('secteur_juridique') is-invalid @enderror">
                                <option value="">Votre choix</option>
                                @foreach($secteurJuriques as $secteurJurique)
                                    <option value="{{$secteurJurique->id}}"
                                            @if(old('secteur_juridique')==$secteurJurique->id) selected="selected" @endif>{{$secteurJurique->designation}}</option>
                                @endforeach
                            </select>
                            @error('secteur_juridique')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Activité principale:
                            <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="activite_principale" id="activite_principale"
                                    class="form-control @error('activite_principale') is-invalid @enderror">
                                <option value="">Votre choix</option>
                                @foreach($activitePrincipales as $activitePrincipale)
                                    <option value="{{$activitePrincipale->id}}"
                                            @if(old('activite_principale')==$activitePrincipale->id) selected="selected" @endif>{{$activitePrincipale->designation}}</option>
                                @endforeach
                            </select>
                            @error('activite_principale')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Activité(s)
                            secondaire(s): <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                       <textarea class="form-control @error('activite_secondaire') is-invalid @enderror" cols="30"
                                 name="activite_secondaire"
                                 rows="3">
                                    {{ old('activite_secondaire') }}
                       </textarea>
                            @error('activite_secondaire')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Date de création:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" name="date_creation" id="date_creation" required="required"
                                   class="form-control ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Montant du capitale
                            sociale
                            : <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="montant_capitale_sociale" id="montant_capitale_sociale"
                                   required="required"
                                   class="form-control ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Chiffre d'affaire
                            : <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="chiffre_affaire" id="chiffre_affaire" required="required"
                                   class="form-control ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Nom et prénom du gérant
                            : <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="nom_prenom_gerant" id="montant_capitale" required="required"
                                   class="form-control ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Présentation
                            générale: <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                       <textarea class="form-control @error('presentation_generale') is-invalid @enderror" cols="30"
                                 name="presentation_generale"
                                 rows="3">
                                    {{ old('presentation_generale') }}
                       </textarea>
                            @error('presentation_generale')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Effectif (nombre employés)
                            : <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="number" name="nombre_employes" id="nombre_employes" required="required"
                                   class="form-control ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Situation structure:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="situation_structure" id="situation_structure"
                                    class="form-control @error('situation_structure') is-invalid @enderror">
                                <option value="">Votre choix</option>
                                @foreach($situationStructures as $situationStructure)
                                    <option value="{{$situationStructure->id}}"
                                            @if(old('situation_structure')==$situationStructure->id) selected="selected" @endif>{{$situationStructure->designation}}</option>
                                @endforeach
                            </select>
                            @error('situation_structure')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Structure mère
                            : <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="structure_mere" id="structure_mere" required="required"
                                   class="form-control ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Filiale d'une
                            multinationale: <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">

                            Oui <input type="radio" class="flat padding-eighty" name="filiale_multinationale" id="OUI"
                                       value="OUI" required/>
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            Non <input type="radio" class="flat" checked="" name="filiale_multinationale" id="NON"
                                       value="NON"/>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Adresse:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="adresse" id="e-mail" required="required"
                                   class="form-control ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Pays: <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="pays" id="pays"
                                    class="form-control @error('pays') is-invalid @enderror">
                                <option value="">Votre choix</option>
                                @foreach($listePays as $pays)
                                    <option value="{{$pays->id}}"
                                            @if(old('pay')==$pays->id) selected="selected" @endif>{{$pays->designation}}</option>
                                @endforeach
                            </select>
                            @error('pays')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Ville ou commune
                            (CG): <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="ville" id="ville"
                                    class="form-control @error('pays') is-invalid @enderror">
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
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Département (CG):
                            <span class="required">*</span>
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
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Arrondissement (CG):
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="arrondissement" id="departement"
                                    class="form-control @error('arrondissement') is-invalid @enderror">
                                <option value="">Votre choix</option>
                                @foreach($arrondissements as $arrondissement)
                                    <option value="{{$arrondissement->id}}"
                                            @if(old('arrondissement')==$arrondissement->id) selected="selected" @endif>{{$arrondissement->designation}}</option>
                                @endforeach
                            </select>
                            @error('arrondissement')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Quartier (CG): <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="quartier" id="quartier"
                                    class="form-control @error('quartier') is-invalid @enderror">
                                <option value="">Votre choix</option>
                                @foreach($quartiers as $quartier)
                                    <option value="{{$quartier->id}}"
                                            @if(old('quartier')==$arrondissement->id) selected="selected" @endif>{{$quartier->designation}}</option>
                                @endforeach
                            </select>
                            @error('quartier')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">N° de téléphone:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="telephone" id="telephone" required="required"
                                   class="form-control ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Fax:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="fax" id="fax" class="form-control ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">E-mail:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="email" id="email" value="{{$utilisateur->email ?? ''}}" readonly
                                   class="form-control ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Site web:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="site_web" id="site_web"
                                   class="form-control ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Réseaux sociaux:
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="reseaux_sociaux" id="fax"
                                   class="form-control ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Qu'est ce qui vous
                            motive à intégrer le dispositif Cluster PME dans le cadre du PRCCEII ?: <span
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
    <!-- /sous formulaire identité-->

    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Pièces joindre au dossier</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Documents obligatoires à
                        fournir (liste à fournir ou à préciser): <span
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

@endsection

@push('stylesheets')

@endpush

@push('scripts')

@endpush

