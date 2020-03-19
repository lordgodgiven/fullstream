<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('images/logo_prcce.png') }}" type="image/ico"/>

    <title>PRCCE | Connexion </title>

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Fonticons -->
    <link rel="stylesheet" href="{{ asset('assets/css/fonticons.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <!-- NProgress -->
    <link href="{{ asset('css/nprogress.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>

<body class="login"
      style="background-color:#646566;  background-image: url({{ asset('images/bkg4.png') }});  color: white">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <a href="/"> <img src="{{ asset('images/logo_prcce.png') }}" height="150px" width="150px"
                                  alt="Logo Cluster Congo" title="Acceuil"></a>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h1>Connexion</h1>
                    <div>
                        <input type="text" class="form-control @error('login') is-invalid @enderror"
                               placeholder="Identifiant" name="login" value="{{ old('login') }}" required
                               autocomplete="login" autofocus/>
                        @error('login')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                               placeholder="Mot de passe" name="password" required autocomplete="current-password"/>
                        @error('password')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <button class="btn btn-warning submit" style="color: #646566; font-weight: bolder;">Connexion
                        </button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">

                        <div class="clearfix"></div>
                        <br/>

                        <div>
                            <h1>CLUSTERS CONGO</h1>
                            <p>©2020 All Rights Reserved. Programme de renforcement des capacités commerciales et
                                entrepreneuriales.</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
</body>
</html>
