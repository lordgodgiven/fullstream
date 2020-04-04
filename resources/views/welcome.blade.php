<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>PRCCE | Accueil</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('images/logo_prcce.png') }}" type="image/ico"/>

    <!--Google Font link-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fonticons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootsnav.css') }}">


    <!--For Plugins external css-->
    <!--<link rel="stylesheet" href="assets/css/plugins.css" />-->
    <!--Theme custom css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!--<link rel="stylesheet" href="assets/css/colors/maron.css">-->
    <link href="{{asset('css/toastr.min.css')}}" rel="stylesheet"/>

    <!--Theme Responsive css-->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}"/>

    <script src="{{ asset('assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
</head>

<body data-spy="scroll" data-target=".navbar-collapse">
<!-- Preloader -->
<div class="preloader"></div>
<!--End off Preloader -->

<div class="culmn">
    <!--Home page style-->


    <nav class="navbar navbar-default navbar-fixed white no-background bootsnav">

        <div class="container">
            <!-- Start Atribute Navigation -->
            <div class="attr-nav">
                <ul>

                    <li class="side-menu"><a href="#"><i class="fa fa-bars"></i></a></li>
                </ul>
            </div>
            <!-- End Atribute Navigation -->

            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand">

                    <img src="{{ asset('assets/images/logo.png') }}" class="logo logo-display m-top-10" alt="">
                    <img src="{{ asset('assets/images/logo.png') }}" class="logo logo-scrolled" alt="">

                </a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                    <li><a href="#hello">Accueil</a></li>
                    <li><a href="#about">PRCCE II</a></li>
                    <li><a href="#service">Clusters PME</a></li>
                    <li><a href="#portfolio">Chaines de valeurs</a></li>
                    <li><a href="#pricing">Espace Prestataires</a></li>
                    <li><a href="#pricing">Espace Bénéficiaires</a></li>
                    <li><a href="{{ route('login') }}">Mon compte</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>


        <!-- Start Side Menu -->
        <div class="side">
            <a href="#" class="close-side"><i class="fa fa-times"></i></a>
            <div class="widget">
                <h6 class="title">Outils</h6>
                <ul class="link">
                    <li><a href="#" target="_blank">Espace Formation</a></li>
                    <li><a href="#">Espace Collaboratif</a></li>
                    <li><a href="#">HelpDesk CCIAM</a></li>
                </ul>
            </div>
        </div>
        <!-- End Side Menu -->

    </nav>


    <!--Home Sections-->

    <section id="hello" class="home bg-mega">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="main_home">
                    <div class="home_text">
                        <h1 class="text-white">Clusters PME Congo</h1>
                    </div>
                    <br><br>
                    <div class="home_btns m-top-40">
                        <a href="#about" class="btn btn-default m-top-20">PRCCE II</a>
                    </div>

                </div>
            </div><!--End off row-->
        </div><!--End off container -->
    </section> <!--End off Home Sections-->


    <!--About Sections-->
    <section id="about" class="about roomy-100">
        <div class="container">
            <div class="row">
                <div class="main_about">
                    <div class="col-md-6">
                        <div class="about_content">
                            <h2>PRCCE II</h2>
                            <div class="separator_left"></div>

                            <p>Financée sous le 11è FED (Fonds européen de développement) à hauteur de 12,4 millions
                                d’euros (soit 8 milliards de FCFA) par l’Union européenne, pour la période 2017-2020, la
                                2e phase du Programme de renforcement des capacités commerciales et entrepreneuriales
                                (PRCCE-II) a été lancée mardi 7 mars 2017 à Brazzaville( Congo) par le ministre d’Etat,
                                ministre de la Construction, de l’urbanisme de la ville et du Cadre de vie, Claude
                                Alphonse N’Silou, représentant le Premier ministre, chef du gouvernement, Clément
                                Mouamba.</p><br>
                            <p>Ce projet vise la formation de 5000 Petites et moyennes entreprises (PME), associations
                                et créateurs d’entreprises ; la structuration de 1250 PME en clusters ; et le
                                renforcement des capacités de 200 bureaux d’études et de cabinets de conseil locaux
                                chaque année. L’objectif est d’atteindre 6.000 bénéficiaires en l’espace de 4 ans du
                                projet.</p>
                            <br>
                            <p>Les PME étant des moteurs de la croissance économique dans les pays développés, L’Union
                                européenne est donc convaincue qu’elles ont le même rôle central à jouer dans la
                                croissance et la diversification de l’économie congolaise.</p>
                            <br>
                            <p>
                                Pour y parvenir, l’Union européenne a réuni depuis 2008 l’ensemble de ses programmes et
                                instruments d’appui aux PME dans un cadre politique complet intitulé « Small Business
                                Act » ou « Loi sur les Petites entreprises ». Cette Loi repose sur trois piliers, à
                                savoir :
                                <b>
                                    <ol style="color: #e4be00;">
                                        <li>
                                            La règlementation intelligente ou simplification des formalités ;
                                        </li>
                                        <li>
                                            L’accès au financement ;
                                        </li>
                                        <li>
                                            La mise en réseau des entreprises et la promotion de la culture et de
                                            l’esprit d’entreprise.
                                        </li>
                                    </ol>
                                </b>
                            </p>
                            <br>
                            <p>
                                Enfin, le prcce se donne aussi un objectif de réduire les obstacles qui empêchent
                                certains groupes de la population, notamment les femmes, les jeunes ou les personnes
                                vivant avec handicap d’exploiter leur potentiel d’entreprendre.
                            </p>
                        </div>
                    </div>
                    <br><br><br><br><br>
                    <div class="col-md-6">
                        <div class="about_accordion wow fadeIn">
                            <div id="faq_main_content" class="faq_main_content">
                                <h6 class="open" style="background-color: #fcd615; height: 75px;"><i
                                        class="fa fa-angle-right"></i>Renforcement du secteur privé et developpement
                                    durable des PME</h6>
                                <div class="open">
                                    <div class="content">
                                        <p>
                                            Pour optimiser ses impacts sur la société congolaise, le programme va
                                            concentrer ses fonds sur le renforcement des acteurs économiques de la
                                            chaîne de valeur Maïs.
                                        </p>
                                        <p>
                                            En collaboration avec le ministre des petites et moyennes entreprises, de
                                            l'artisanat et du secteur informel, le PRCCE II appuiera les PME Congolaises
                                            dans le developpement de réseaux d'entreprises spécialisées dans la
                                            transformation du maïs, l'aviculture, la boulangerie et la transformation
                                            des fruits et des plantes.
                                        </p>
                                        <p>
                                            Les secteurs des services aux entreprises et industries et du numérique
                                            bénéficieront aussi d'un accompagnement transversal. Enfin, pour prolonger
                                            l'implication de l'Union Européenne dans la gouvernance forestière,le
                                            secteur du bois (menuiserie) sera également concerné.
                                        </p>

                                    </div>
                                </div> <!-- End off accordion item-1 -->

                                <h6 class="open" style="background-color: #fcd615;  height: 75px;"><i
                                        class="fa fa-angle-right"></i> Amélioration du climat des affaires</h6>
                                <div class="open">
                                    <div class="content">
                                        <p>
                                            Pour optimiser ses impacts sur la société congolaise, le programme va
                                            concentrer ses fonds sur le renforcement des acteurs économiques de la
                                            chaîne de valeur Maïs.
                                        </p>
                                        <p>
                                            En collaboration avec le ministre des petites et moyennes entreprises, de
                                            l'artisanat et du secteur informel, le PRCCE II appuiera les PME Congolaises
                                            dans le developpement de réseaux d'entreprises spécialisées dans la
                                            transformation du maïs, l'aviculture, la boulangerie et la transformation
                                            des fruits et des plantes.
                                        </p>
                                        <p>
                                            Les secteurs des services aux entreprises et industries et du numérique
                                            bénéficieront aussi d'un accompagnement transversal. Enfin, pour prolonger
                                            l'implication de l'Union Européenne dans la gouvernance forestière,le
                                            secteur du bois (menuiserie) sera également concerné.
                                        </p>

                                    </div>
                                </div> <!-- End off accordion item-2 -->

                                <h6 class="open" style="background-color: #fcd615;  height: 75px;"><i
                                        class="fa fa-angle-right"></i> Appui aux négociations commerciales</h6>
                                <div class="open">
                                    <div class="content">
                                        <p>
                                            Pour optimiser ses impacts sur la société congolaise, le programme va
                                            concentrer ses fonds sur le renforcement des acteurs économiques de la
                                            chaîne de valeur Maïs.
                                        </p>
                                        <p>
                                            En collaboration avec le ministre des petites et moyennes entreprises, de
                                            l'artisanat et du secteur informel, le PRCCE II appuiera les PME Congolaises
                                            dans le developpement de réseaux d'entreprises spécialisées dans la
                                            transformation du maïs, l'aviculture, la boulangerie et la transformation
                                            des fruits et des plantes.
                                        </p>
                                        <p>
                                            Les secteurs des services aux entreprises et industries et du numérique
                                            bénéficieront aussi d'un accompagnement transversal. Enfin, pour prolonger
                                            l'implication de l'Union Européenne dans la gouvernance forestière,le
                                            secteur du bois (menuiserie) sera également concerné.
                                        </p>

                                    </div>
                                </div> <!-- End off accordion item-3 -->
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--End off row-->
        </div><!--End off container -->
    </section> <!--End off About section -->

    <div class="container service" id="service">
        <div class="row">
            <div class="main_featured m-top-100">
                <div class="col-sm-12">
                    <div class="head_title">
                        <h2 class="text-center">Clusters PME</h2>
                        <div class="separator_auto"></div>
                        <p class="text-center" style="font-weight: bolder;">Avec le programme PRCCE II, le gouvernement
                            congolais et l'Union européenne se mobilisent pour les entreprises. </p>
                        <p style="font-weight: bold;">
                        <ol><br>
                            <li>
                                Faire émerger une génération de TPE/PME solides, solidaires
                                et compétitives.
                                <ol>
                                    <li>
                                        Construire des chaînes de valeur porteuses de croissance et d'emploi :
                                        maïs/aviculture,
                                        fruits et plantes, menuiserie/bois.
                                    </li>
                                    <li>
                                        Pour répondre à la demande du marché.
                                    </li>
                                </ol>
                            </li>
                            <br><br>
                            <li>
                                Autour d'une démarche innovante, participative et collective.
                                <ol><br>
                                    <li>
                                        Autour d'une démarche innovante, participative et collective
                                        • Amener les TPE, les PME et les grandes entreprises à travailler ensemble, en
                                        "clusters".
                                        Pour mieux répondre à leurs problématiques respectives et mutualiser leurs
                                        ressources.
                                    </li>
                                    <li>
                                        En parallèle, renforcer et coordonner les services publics pour améliorer climat
                                        des affaires
                                        et échanges commerciaux.
                                    </li>
                                </ol>
                            </li>
                            <br><br>
                            <li>
                                Avec des solutions concrètes et une large gamme de services.
                                <ol><br>
                                    <li>
                                        Mise à disposition de 5 000 journées d'expertise, à tous les niveaux des chaînes
                                        de valeur.
                                    </li>
                                    <li>
                                        Création d'un "Helpdesk" et formations OHADA avec la CCIAM de Pointe-Noire.
                                    </li>
                                    <li>
                                        Résolution des litiges commerciaux avec les CEMACO de Brazzaville et
                                        Pointe-Noire.
                                    </li>
                                    <li>
                                        Normalisation avec l'ACONOQ, pour garantir la qualité des produits mis sur le
                                        marché.
                                    </li>
                                </ol>
                            </li>
                            <br><br>
                            <li>
                                Dans un cadre réglementaire redéfini pour lever les blocages.
                                <ol><br>
                                    <li>
                                        Sur les principaux aspects liés à la vie de l'entreprise, quelle que soit sa
                                        taille : juridique,
                                        comptable, normalisation et qualité, politique de prix, négociations
                                        commerciales, etc.
                                    </li>
                                    <li>
                                        Au plus haut niveau, grâce à l'implication de tous les partenaires : ministères,
                                        agences
                                        nationales, organisations intermédiaires, l'UE et ses États-membres.
                                    </li>
                                </ol>
                            </li>
                            <br><br>
                            <li>
                                Pour la valorisation des produits congolais
                                <ol><br>
                                    <li>
                                        Des produits de qualité, compétitifs et attractifs sur les marchés locaux,
                                        régionaux et
                                        internationaux (500 millions de consommateurs potentiels dans l'UE).
                                    </li>
                                    <li>
                                        Des produits à valeur ajoutée pour des entreprises plus rentables, avec de
                                        meilleures
                                        marges bénéficiaires.
                                    </li>
                                </ol>
                            </li>
                        </ol>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="featured_slider">
        <div>
            <div class="featured_img">
                <img src="{{ asset('assets/images/fprojects/1.jpg') }}" alt=""/>
                <a href="{{ asset('assets/images/fprojects/1.jpg') }}" class="popup-img"></a>
            </div>
        </div>
        <div>
            <div class="featured_img">
                <img src="{{ asset('assets/images/fprojects/2.jpg') }}" alt=""/>
                <a href="{{ asset('assets/images/fprojects/2.jpg') }}" class="popup-img"></a>
            </div>
        </div>
        <div>
            <div class="featured_img">
                <img src="{{ asset('assets/images/fprojects/3.jpg') }}" alt=""/>
                <a href="{{ asset('assets/images/fprojects/3.jpg') }}" class="popup-img"></a>
            </div>
        </div>
        <div>
            <div class="featured_img">
                <img src="{{ asset('assets/images/fprojects/4.jpg') }}" alt=""/>
                <a href="{{ asset('assets/images/fprojects/4.jpg') }}" class="popup-img"></a>
            </div>
        </div>
        <div>
            <div class="featured_img">
                <img src="{{ asset('assets/images/fprojects/5.jpg') }}" alt=""/>
                <a href="{{ asset('assets/images/fprojects/5.jpg') }}" class="popup-img"></a>
            </div>
        </div>
    </div><!-- End off featured slider -->


    <!--Service Section-->
    <section>
        <div class="container">
            <div class="row">
                <div class="main_service roomy-100">
                    <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                        <div class="head_title text-center">
                            <h2>Chaines de valeurs</h2>
                            <div class="separator_auto"></div>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                sed diam nonummy nibh euismod nostrud exerci tation ullamcorper
                                suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="service_item">
                            <i class="icofont icofont-light-bulb"></i>
                            <h6 class="m-top-30">BRANDING</h6>
                            <div class="separator_small"></div>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                                magna aliquam erat volutpat. </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="service_item">
                            <i class="icofont icofont-imac"></i>
                            <h6 class="m-top-30">BRANDING</h6>
                            <div class="separator_small"></div>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                                magna aliquam erat volutpat. </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="service_item">
                            <i class="icofont icofont-video"></i>
                            <h6 class="m-top-30">BRANDING</h6>
                            <div class="separator_small"></div>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                                magna aliquam erat volutpat. </p>
                        </div>
                    </div>
                </div>
            </div><!--End off row -->
        </div><!--End off container -->
    </section> <!--End off Featured section-->


    <!--Impress section-->
    <section id="impress" class="impress roomy-100">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="main_impress text-center">
                    <div class="col-sm-8 col-sm-offset-2">
                        <h2 class="text-white text-uppercase">Impressed? Let’s work together</h2>
                        <p class="m-top-40 text-white">At vero eos et accusamus et iusto odio dignissimos ducimus qui
                            ditqs praesentium
                            voluptatum deleniti atque corrupti quos dolores et quas molestias</p>

                        <div class="impress_btns m-top-30">
                            <a href="" class="btn btn-primary m-top-20">HIRE US</a>
                            <a href="" class="btn btn-default m-top-20">HIRE US</a>
                        </div>
                    </div>
                </div>
            </div><!--End off row -->
        </div><!--End off container -->
    </section><!-- End off Impress section-->


    <!--Portfolio Section-->
    <section id="portfolio" class="portfolio lightbg">
        <div class="container">
            <div class="row">
                <div class="main_portfolio roomy-100">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="head_title text-center">
                            <h2>OUR PORTOFLIO</h2>
                            <div class="separator_auto"></div>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                sed diam nonummy nibh euismod nostrud exerci tation ullamcorper
                                suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>
                        </div>
                    </div>

                    <div class="portfolio_content">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portfolio_item">
                                        <img src="{{ asset('assets/images/Portfolio/2.jpg') }}" alt=""/>
                                        <div class="portfolio_hover text-center">
                                            <h6 class="text-uppercase text-white">Title</h6>
                                            <p class=" text-white">Lorem ipsum dolor sit amet</p>
                                            <div class="portfolio_hover_icon">
                                                <a href="{{ asset('assets/images/Portfolio/2.jpg') }}"
                                                   class="popup-img"><i class="fa fa-expand"></i></a>
                                                <a href=""><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 m-top-30">
                                    <div class="portfolio_item portfolio_item2">
                                        <img src="{{ asset('assets/images/Portfolio/3.jpg') }}" alt=""/>
                                        <div class="portfolio_hover text-center">
                                            <h6 class="text-uppercase text-white">Title</h6>
                                            <p class=" text-white">Lorem ipsum dolor sit amet</p>
                                            <div class="portfolio_hover_icon">
                                                <a href="{{ asset('assets/images/Portfolio/3.jpg') }}"
                                                   class="popup-img"><i class="fa fa-expand"></i></a>
                                                <a href=""><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 m-top-30">
                                    <div class="portfolio_item portfolio_item2">
                                        <img src="{{ asset('assets/images/Portfolio/5.jpg') }}" alt=""/>
                                        <div class="portfolio_hover text-center">
                                            <h6 class="text-uppercase text-white">Title</h6>
                                            <p class=" text-white">Lorem ipsum dolor sit amet</p>
                                            <div class="portfolio_hover_icon">
                                                <a href="{{ asset('assets/images/Portfolio/5.jpg') }}"
                                                   class="popup-img"><i class="fa fa-expand"></i></a>
                                                <a href=""><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="portfolio_item portfolio_item3 sm-m-top-30">
                                <img src="{{ asset('assets/images/Portfolio/1.jpg') }}" alt=""/>
                                <div class="portfolio_hover text-center">
                                    <h6 class="text-uppercase text-white">Title</h6>
                                    <p class=" text-white">Lorem ipsum dolor sit amet</p>
                                    <div class="portfolio_hover_icon">
                                        <a href="{{ asset('assets/images/Portfolio/1.jpg') }}" class="popup-img"><i
                                                class="fa fa-expand"></i></a>
                                        <a href=""><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 m-top-30">
                            <div class="portfolio_item portfolio_item2">
                                <img src="{{ asset('assets/images/Portfolio/6.jpg') }}" alt=""/>
                                <div class="portfolio_hover text-center">
                                    <h6 class="text-uppercase text-white">Title</h6>
                                    <p class=" text-white">Lorem ipsum dolor sit amet</p>
                                    <div class="portfolio_hover_icon">
                                        <a href="{{ asset('assets/images/Portfolio/6.jpg') }}" class="popup-img"><i
                                                class="fa fa-expand"></i></a>
                                        <a href=""><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 m-top-30">
                            <div class="portfolio_item">
                                <img src="{{ asset('assets/images/Portfolio/4.jpg') }}" alt=""/>
                                <div class="portfolio_hover text-center">
                                    <h6 class="text-uppercase text-white">Title</h6>
                                    <p class=" text-white">Lorem ipsum dolor sit amet</p>
                                    <div class="portfolio_hover_icon">
                                        <a href="{{ asset('assets/images/Portfolio/4.jpg') }}" class="popup-img"><i
                                                class="fa fa-expand"></i></a>
                                        <a href=""><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!--End off row -->
        </div><!--End off container -->
    </section><!-- End off Portfolio section-->


    <!--Skill Sections-->
    <section id="skill" class="skill roomy-100">
        <div class="container">
            <div class="row">
                <div class="main_skill">
                    <div class="col-md-6">
                        <div class="skill_content wow fadeIn">
                            <h2>Our skill</h2>
                            <div class="separator_left"></div>

                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                                magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                                quis nostrud exerci tation ullamcorper suscipit lobortis
                                nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor
                                sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                Ut wisi enim ad minim veniam, quis nostrud exerci tation
                                ullamcorper suscipit lobortis nisl ut aliquip
                                ex ea commodo consequat. </p>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="skill_bar sm-m-top-50">
                            <div class="teamskillbar clearfix m-top-20" data-percent="80%">
                                <h6>GRAPHIC DESIGN</h6>
                                <div class="teamskillbar-bar"></div>
                            </div> <!-- End Skill Bar -->

                            <div class="teamskillbar clearfix m-top-50" data-percent="75%">
                                <h6>TYPOGRAPHY</h6>
                                <div class="teamskillbar-bar"></div>
                            </div> <!-- End Skill Bar -->

                            <div class="teamskillbar clearfix m-top-50" data-percent="90%">
                                <h6>HTML / CSS</h6>
                                <div class="teamskillbar-bar"></div>
                            </div> <!-- End Skill Bar -->
                        </div>
                    </div>
                </div>
            </div><!--End off row-->
        </div><!--End off container -->
        <br/>
        <br/>
        <br/>
        <hr/>
        <br/>
        <br/>
        <br/>
        <div class="container">
            <div class="row">
                <div class="skill_bottom_content text-center">
                    <div class="col-md-3">
                        <div class="skill_bottom_item">
                            <h2 class="statistic-counter">3468</h2>
                            <div class="separator_small"></div>
                            <h5><em>Projects Finished</em></h5>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="skill_bottom_item">
                            <h2 class="statistic-counter">4638</h2>
                            <div class="separator_small"></div>
                            <h5><em>Happy Clients</em></h5>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="skill_bottom_item">
                            <h2 class="statistic-counter">3468</h2>
                            <div class="separator_small"></div>
                            <h5><em>Hours of work</em></h5>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="skill_bottom_item">
                            <h2 class="statistic-counter">3468</h2>
                            <div class="separator_small"></div>
                            <h5><em>Cup of coffee</em></h5>
                        </div>
                    </div>
                </div>
            </div><!--End off row-->
        </div><!--End off container -->
    </section> <!--End off Skill section -->


    <!--Testimonial Section-->
    <section id="testimonial" class="testimonial fix">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="main_testimonial roomy-100">
                    <div class="head_title text-center">
                        <h2 class="text-white">OUR TESTIMONIALS</h2>
                    </div>
                    <div class="testimonial_slid text-center">
                        <div class="testimonial_item">
                            <div class="col-sm-10 col-sm-offset-1">
                                <p class="text-white">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                    nonummy
                                    nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                    Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper
                                    suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>

                                <div class="test_authour m-top-30">
                                    <h6 class="text-white m-bottom-20">JOHN DOE - THEMEFOREST USER</h6>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial_item">
                            <div class="col-sm-10 col-sm-offset-1">
                                <p class="text-white">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                    nonummy
                                    nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                    Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper
                                    suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>

                                <div class="test_authour m-top-30">
                                    <h6 class="text-white m-bottom-20">JOHN DOE - THEMEFOREST USER</h6>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial_item">
                            <div class="col-sm-10 col-sm-offset-1">
                                <p class="text-white">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                    nonummy
                                    nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                    Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper
                                    suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>

                                <div class="test_authour m-top-30">
                                    <h6 class="text-white m-bottom-20">JOHN DOE - THEMEFOREST USER</h6>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial_item">
                            <div class="col-sm-10 col-sm-offset-1">
                                <p class="text-white">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                    nonummy
                                    nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                    Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper
                                    suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>

                                <div class="test_authour m-top-30">
                                    <h6 class="text-white m-bottom-20">JOHN DOE - THEMEFOREST USER</h6>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--End off row-->
        </div><!--End off container -->
    </section> <!--End off Testimonial section -->


    <!--Pricing Section-->
    <section id="pricing" class="pricing lightbg">
        <div class="container">
            <div class="row">
                <div class="main_pricing roomy-100">
                    <div class="col-md-8 col-md-offset-2 col-sm-12">
                        <div class="head_title text-center">
                            <h2>Creation de compte</h2>
                            <div class="separator_auto"></div>
                            <p>Chers prestataires et bénéficaire de service, dans le cadre de l'appel à expression
                                d'intérêt, nous proposons aux prestataires de services une un formulaire
                                d'enregistrement en ligne de vos candidatures.</p>
                        </div>
                        <!--Formulaire création compte-->
                        <div>
                            <form class="" action="/compte-utilisateurs" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>
                                                Civilité: <strong>*</strong>
                                            </label>
                                            <select name="civilite" id="civilite"
                                                    class="form-control @error('civilite') is-invalid @enderror">
                                                <option value="">Votre choix</option>
                                                @foreach($civilites as $civilite)
                                                    <option value="{{$civilite->id}}"
                                                            @if(old('civilite')==$civilite->id) selected="selected" @endif>{{$civilite->designation ?? ''}}</option>
                                                @endforeach
                                            </select>
                                            @error('civilites')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>
                                                Genre / Sexe: <strong>*</strong>
                                            </label>
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
                                    <div class="col-sm-6">
                                        <label>
                                            Nom (s): <strong>*</strong>
                                        </label>
                                        <div class="form-group">
                                            <input id="nom" name="nom" type="text" placeholder="Nom"
                                                   class="form-control @error('nom') is-invalid @enderror"
                                                   value="{{ old('nom') }}">
                                            @error('nom')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>
                                            Prenom (s): <strong>*</strong>
                                        </label>
                                        <div class="form-group">
                                            <input id="prenom" name="prenom" type="text" placeholder="Prenom"
                                                   class="form-control @error('prenom') is-invalid @enderror"
                                                   value="{{ old('prenom') }}">
                                            @error('prenom')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>
                                            Nom utilisateur (login) <strong>*</strong>
                                        </label>
                                        <div class="form-group">
                                            <input id="login" name="login" type="text"
                                                   class="form-control @error('login') is-invalid @enderror"
                                                   value="{{ old('login') }}">
                                            @error('login')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>
                                            Mot de passe: <strong>*</strong>
                                        </label>
                                        <div class="form-group">
                                            <input id="password" type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password" required autocomplete="new-password">
                                            @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>
                                            Confirmez le mot de passe <strong>*</strong>
                                        </label>
                                        <div class="form-group">
                                            <input id="password-confirm" type="password" class="form-control"
                                                   name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>
                                            Adresse e-mail<strong>*</strong>
                                        </label>
                                        <div class="form-group">
                                            <input id="email" name="email" type="text"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   value="{{ old('email') }}">
                                            @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>
                                            Confirmez l'ardresse e-mail <strong>*</strong>
                                        </label>
                                        <div class="form-group">
                                            <input id="email_confirmation" name="email_confirmation" type="text"
                                                   class="form-control @error('email_confirmation') is-invalid @enderror">
                                            @error('email_confirmation')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>
                                            Profil utilisateur <strong>*</strong>
                                        </label>
                                        <div class="form-group">
                                            <input id="profil_utilisateur" name="profil_utilisateur" type="text"
                                                   class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>
                                            Question de sécurité <strong>*</strong>
                                        </label>
                                        <div class="form-group">
                                            <input id="question_securite" name="question_securite" type="text"
                                                   class="form-control @error('question_securite') is-invalid @enderror"
                                                   value="{{ old('question_securite') }}">
                                            @error('question_securite')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>
                                                Réponse question de sécurité: <strong>*</strong>
                                            </label>
                                            <input id="reponse_question_securite" name="reponse_question_securite"
                                                   type="text"
                                                   class="form-control @error('reponse_question_securite') is-invalid @enderror"
                                                   value="{{ old('reponse_question_securite') }}">
                                            @error('reponse_question_securite')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>
                                            Type compte <strong>*</strong>
                                        </label>
                                        <div class="form-group">
                                            <select name="type_compte" id="type_compte"
                                                    class="form-control @error('type_compte') is-invalid @enderror">
                                                <option value="">Votre choix</option>
                                                <option value="prestataire">Prestataire</option>
                                                <option value="beneficiaire">Bénéficiaire</option>
                                            </select>
                                            @error('type_compte')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-3 col-sm-3 ">
                                                <input type="checkbox" name="non_fonction_publique"
                                                       id="non_fonction_publique"
                                                       value="Oui" {{ old('non_fonction_publique') == 'Oui' ? 'checked' : '' }}>
                                            </label>
                                            En cochant cette case, je certifie ne pas appartenir à la fonction publique
                                            Congolaise.
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align">
                                                <input type="checkbox" name="accord_usage_donnees"
                                                       id="accord_usage_donnees"
                                                       value="Oui" {{ old('accord_usage_donnees') == 'Oui' ? 'checked' : '' }}>
                                            </label>
                                            En cochant cette case, j’autorise le PRCCE II d’utiliser mes données
                                            personnelles uniquement dans le cadre du programme.
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align">
                                                <input type="checkbox" name="accord_reception_info"
                                                       id="accord_reception_info"
                                                       value="Oui" {{ old('accord_reception_info') == 'Oui' ? 'checked' : '' }}>
                                            </label>
                                            En cochant cette case, j’accepte de recevoir les informations ou les
                                            notifications provenant du PRCCE II
                                        </div>
                                    </div>


                                    <div class="col-sm-12">
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-primary">Creer le compte</button>
                                        </div>
                                    </div>

                                </div>

                            </form>
                        </div>
                        <!--/Formulaire création compte-->
                    </div>
                </div>
            </div>

        </div><!--End off container -->
    </section> <!--End off Pricing section -->


    <!--Contact Us Section-->
    <section id="contact" class="contact bg-mega fix">
        <div class="container">
            <div class="row">
                <div class="main_contact roomy-100 text-white">
                    <div class="col-md-4">
                        <div class="rage_widget">
                            <div class="widget_head">
                                <h3 class="text-white">Clusters PME Congo</h3>
                                <div class="separator_small"></div>
                            </div>
                            <p>
                            <ul>
                                <li>
                                    <span><i class="fa fa-envelope-square"></i> info@clusterscongo.cg</span>
                                </li>
                                <li>
                                    <span><i class="fa fa-phone-square"></i> +242069712618</span>
                                </li>
                                <li>
                                    <span><i class="fa fa-map"></i> Centre ville, Ministère du plan</span>
                                </li>
                            </ul>
                            </p>

                            <div class="widget_socail m-top-30">
                                <ul class="list-inline">
                                    <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                    <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                    <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href=""><i class="fa fa-vimeo"></i></a></li>
                                    <li><a href=""><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 sm-m-top-30">
                        <form class="" action="subcribe.php">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input id="first_name" name="first_name" type="text" placeholder="Votre Nom"
                                               class="form-control" required="">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input id="phone" name="phone" type="text" placeholder="Votre Téléphone"
                                               class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea class="form-control" rows="6"
                                                  placeholder="Tapez votre message"></textarea>
                                    </div>
                                    <div class="form-group text-center">
                                        <a href="" class="btn btn-primary">Envoyer</a>
                                    </div>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div><!--End off row -->
        </div><!--End off container -->
    </section><!--End off Contact Section-->


    <!-- scroll up-->
    <div class="scrollup">
        <a href="#"><i class="fa fa-chevron-up"></i></a>
    </div><!-- End off scroll up -->


    <footer id="footer" class="footer bg-black">
        <div class="container">
            <div class="row">
                <div class="main_footer text-center p-top-40 p-bottom-30">
                    <p class="wow fadeInRight" data-wow-duration="1s">
                        Developpeed by
                        <a target="_blank" href="http://bootstrapthemes.co">IMAGINE TECHNOLOGY</a>
                        2020.Clusters PME Congo All Rights Reserved
                    </p>
                </div>
            </div>
        </div>
    </footer>


</div>

<!-- JS includes -->

<script src="{{ asset('assets/js/vendor/jquery-1.11.2.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>

<script src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('assets/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.collapse.js') }}"></script>
<script src="{{ asset('assets/js/bootsnav.js') }}"></script>
<script src="{{asset('js/toastr.min.js')}}"></script>


<!-- paradise slider js -->


<script src="http://maps.google.com/maps/api/js?key=AIzaSyD_tAQD36pKp9v4at5AnpGbvBUsLCOSJx8"></script>
<script src="{{ asset('assets/js/gmaps.min.js') }}"></script>

<script>
    function showmap() {
        var mapOptions = {
            zoom: 8,
            scrollwheel: false,
            center: new google.maps.LatLng(-34.397, 150.644),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
        $('.mapheight').css('height', '350');
        $('.maps_text h3').hide();
    }

</script>


<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
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
        @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>
</body>
</html>
