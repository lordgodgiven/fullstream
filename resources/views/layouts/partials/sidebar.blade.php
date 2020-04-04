<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        @if(Auth::user()->type_compte === "prestataire")
            <h3>Prestataire</h3>
        @elseif(Auth::user()->type_compte === "beneficiaire")
            <h3>Beneficiaire</h3>
        @elseif(Auth::user()->type_compte === "gestionnaire")
            <h3>Gestionnaire</h3>
        @elseif(Auth::user()->type_compte === "administrateur")
            <h3>Administrateur</h3>
        @endif
        <ul class="nav side-menu">
            <li><a><i class="fa fa-bar-chart-o"></i> Tableau de bord <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="#">Suivi des indicateurs</a></li>
                    <li><a href="#">Statistiques</a></li>
                </ul>
            </li>
            @if(Auth::user()->type_compte === "prestataire" or Auth::user()->type_compte === "beneficiaire")
                <li><a><i class="fa fa-folder"></i> Mon dossier <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        @if(Auth::user()->type_compte === "prestataire")
                            <li><a href="{{route('dossier-prestataire.create')}}">Informations personnelles</a></li>
                        @endif
                        @if(Auth::user()->type_compte === "beneficiaire")
                            <li><a href="{{route('dossier-beneficiaire.create')}}">Informations personnelles</a></li>
                        @endif
                        @if(Auth::user()->type_compte === "prestataire")
                            <li><a href="#">Mes accréditations</a></li>
                            <li><a href="#">Mes contrats</a></li>
                            <li><a href="#">Mes dossiers de mise en oeuvre</a></li>
                        @endif
                        @if(Auth::user()->type_compte === "beneficiaire")
                            <li><a href="{{route('dossier-beneficiaire.prestation.create')}}">Mes demandes de
                                    prestations</a></li>
                            <li><a href="#">Mes dossiers de mise en oeuvre</a></li>
                            <li><a href="#">Mes Clusters</a></li>
                        @endif
                    </ul>
                </li>
            @endif
            @if(Auth::user()->type_compte === "prestataire" or Auth::user()->type_compte === "beneficiaire" or Auth::user()->type_compte === "gestionnaire")
                <li><a><i class="fa fa-group"></i> Clusters <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        @if(Auth::user()->type_compte === "prestataire")
                            <li><a href="#">Cluster services</a></li>
                        @endif
                        @if(Auth::user()->type_compte === "beneficiaire")
                            <li><a href="{{route('cluster-beneficiaire.create')}}"> Clusters PME</a></li>
                            <li><a href="">Suivi des actions de structuration des clusters</a></li>
                        @endif
                        @if(Auth::user()->type_compte === "gestionnaire")
                            <li><a href="{{route('gestionnaire-cluster.create')}}"> Clusters PME</a></li>
                    @endif
                    <!--<li><a href="{{route('gestionnaire.prestataire')}}">Prestataires</a></li>
                    <li><a href="{{route('gestionnaire.beneficiaire')}}">Bénéficiaires</a></li>
                    <li><a href="#">Clusters</a></li>-->
                    </ul>
                </li>
            @endif
            @if(Auth::user()->type_compte === "gestionnaire" OR Auth::user()->type_compte === "administrateur")
                <li><a><i class="fa fa-desktop"></i> Gestion <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#">Eligibilité <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu" style="display: block;">
                                <li><a href="{{route('gestionnaire.prestataire')}}">Prestataire
                                        ({{$prestatairesAttenteEligibilite - $prestatairesEligible}})</a>
                                </li>
                                <li><a href="{{route('gestionnaire.beneficiaire')}}">Bénéficiaire
                                        ({{$beneficiairesAttenteEligibilite - $beneficiairesEligible}})</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#">Accréditation prestataires <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu" style="display: block;">
                                <li><a href="{{route('gestionnaire.accreditation_level_one')}}">Niveau 1 </a>
                                </li>
                                <li><a href="{{route('gestionnaire.accreditation_level_two')}}">Niveau 2</a>
                                </li>
                                <li><a href="#">Niveau 3</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#">Validation</a></li>
                        <li><a href="#">Offre de prestation</a></li>
                        <li><a href="{{route('gestionnaire.tdr.create')}}">Gestion des TDR</a></li>
                        <li><a href="{{route('gestionnaire.rapport.analyse.create')}}">Gestion des rapports d'analyse
                                sommaires</a></li>
                        <li><a href="{{route('gestionnaire.contrat.create')}}">Gestion des contrats de prestation</a>
                        </li>
                        <li><a href="{{route('gestionnaire.contribution.beneficiaire.create')}}">Versement de la
                                contribution de bénéficiaires</a></li>
                        <li><a href="icons.html">Suivi & Evaluation</a></li>
                    </ul>
                </li>
            @endif
            <li><a><i class="fa fa-user"></i> Mon Compte <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    @if(Auth::user()->type_compte === "prestataire" OR Auth::user()->type_compte === "beneficiaire")
                        <li><a href="{{route('profile.show',Auth::user()->id)}}">Profile du compte</a></li>
                    @else
                        <li><a href="#">Changer mot de passe</a></li>
                    @endif
                    <li><a href="#">Messagerie</a></li>
                    <li><a href="#">Assitance technique</a></li>
                </ul>
            </li>
            @if(Auth::user()->type_compte === "administrateur" )
                <li><a><i class="fa fa-cog"></i>Parametres<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{route('administration.utilisateurs')}}">Gestion des utilisateurs</a></li>
                        <li><a href="#">Gestion des référenciels</a></li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</div>
