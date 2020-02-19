<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        @if(Auth::user()->type_compte_id==1)
            <h3>Prestataire</h3>
        @elseif(Auth::user()->type_compte_id==2)
            <h3>Beneficiaire</h3>
        @endif
        <ul class="nav side-menu">
            <li><a><i class="fa fa-bar-chart-o"></i> Tableau de bord <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="index.html">Suivi des indicateurs</a></li>
                    <li><a href="index2.html">Statistiques</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-edit"></i> Inscriptions <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    @if(Auth::user()->type_compte_id==1)
                        <li><a href="{{route('dossier-prestataire.create')}}">Prestataires</a></li>
                    @endif
                    @if(Auth::user()->type_compte_id==2)
                        <li><a href="{{route('dossier-beneficiaire.create')}}">Bénéficiaires</a></li>
                    @endif
                    <li><a href="form_validation.html">Clusters</a></li>
                    <li><a href="form_validation.html">Chaine de valeur</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-folder"></i> Ouvrir un dossier <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('gestionnaire.prestataire')}}">Prestataires</a></li>
                    <li><a href="{{route('gestionnaire.beneficiaire')}}">Bénéficiaires</a></li>
                    <li><a href="form_validation.html">Clusters</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-desktop"></i> Gestion <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="general_elements.html">Eligibilité</a></li>
                    <li><a href="media_gallery.html">Accréditation</a></li>
                    <li><a href="typography.html">Validation</a></li>
                    <li><a href="typography.html">Offre de prestation</a></li>
                    <li><a href="icons.html">Demandes de prestations</a></li>
                    <li><a href="icons.html">Suivi & Evaluation</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-user"></i> Mon Compte <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('profile.show',Auth::user()->id)}}">Mes informations</a></li>
                    <li><a href="tables_dynamic.html">Messagerie</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-cog"></i>Parametres<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('administration.utilisateurs')}}">Gestion des utilisateurs</a></li>
                    <li><a href="#">Gestion des référenciels</a></li>
                </ul>
            </li>
        </ul>
    </div>

</div>
