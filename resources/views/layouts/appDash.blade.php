<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Healthina - @yield('title') </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome5-overrides.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="{{asset('assets/css/slider.compiled.css')}}">
    @yield('csspage')
</head>

<body class="body">
    <nav class="navbar navbar-light navbar-expand-md sticky-top m-auto navigation-clean-search">
        <div class="container"><a class="navbar-brand" href="{{route('front.home')}}"><img class="img-fluid" src="{{asset('assets/img/Asset%2010.png')}}" style="border-radius: 0px;margin-top: 0px;width: 51px;"></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse text-center" id="navcol-1">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link @yield('acceuil_active')" href="{{route('front.home')}}">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link @yield('articles_active')" href="{{route('front.articles')}}">Articles</a></li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="#">Recettes</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('front.recettes', ['categorie' =>'vegetarien'])}}">végétarien<br></a>
                            <a class="dropdown-item" href="{{route('front.recettes', ['categorie' =>'glutenFree'])}}">Sans gluten<br></a>
                            <a class="dropdown-item" href="{{route('front.recettes', ['categorie' => 'PlantB'])}}">Plant-B</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link text-center" aria-expanded="false" data-toggle="dropdown" href="#">Guide</a>
                        <div class="dropdown-menu"><a class="dropdown-item" href="{{route('front.adresse')}}">Bonne adresse</a>
                            <a class="dropdown-item" href="{{route('front.adresseWeb')}}">Bonne adresse web</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link @yield('forum_active')" href="{{route('front.forum')}}">Forum</a></li>
                    <li class="nav-item" style="font-family: 'Niveau Grotesk';font-weight: 700;"></li>
                </ul>
                <form class="form-inline text-center d-flex d-sm-flex justify-content-center mx-auto justify-content-sm-center" target="_self">
                    <div class="form-group text-center" style="background: #e7e7e7;border-radius: 50px;padding-left: 13px;">
                        <label for="search-field"><i class="fa fa-search" style="color: rgb(99,99,99);font-size: 16px;"></i></label>
                        <input class="form-control search-field" type="search" id="search-field" name="search">
                    </div>
                </form>
                @guest
                <a class="btn btn-outline-secondary login" role="button" href="{{route('login')}}">
                    <i class="fa fa-user" style="font-size: 18px;"></i>
                </a>
                <a class="btn btn-primary signin" role="button" href="{{route('register')}}">Rejoindre<br></a>
                @else
                <a class="btn btn-outline-secondary login" role="button" href="#">
                    <i class="fa fa-user" style="font-size: 18px;"></i>
                </a>
                <a class="btn btn-primary signin" role="button" href="#" onclick="document.getElementById('logout-form').submit();">Log out<br></a>
                <form id="logout-form" action="{{route('logout')}}" style="display: none;" method="post">
                    @csrf
                </form>
                @endguest
            </div>
        </div>
    </nav>
    <div id="wrapper">
        <div id="sidebar-wrapper" style="border-radius: 50px;border-width: 5px;box-shadow: 0px 0px 8px rgba(33,37,41,0.15);border-top-left-radius: 0;border-bottom-left-radius: 0px;margin-top: 25px;">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"> <a href="#"><i class="fa fa-user"></i>&nbsp; &nbsp; &nbsp; {{auth()->user()->name}}&nbsp;</a></li>
                <li> <a class="dash-item-user" href="{{route('dash.home')}}" style="font-weight: bold;"><i class="fa fa-heart"></i>&nbsp; &nbsp; &nbsp;Articles favoris</a></li>
                <li> <a class="dash-item-user" href="{{route('dash.recipe')}}" style="font-weight: bold;"><i class="fa fa-bookmark"></i>&nbsp; &nbsp; &nbsp; Recettes&nbsp;enregistrer</a></li>
                <li> <a class="dash-item-user" href="{{route('dash.comment')}}" style="font-weight: bold;"><i class="fa fa-comment"></i>&nbsp; &nbsp; &nbsp;Commentaries</a></li>
            </ul>
        </div>
        <div class="page-content-wrapper">
            <div class="container-fluid"><a class="btn btn-light" role="button" id="menu-toggle" href="#menu-toggle"><i class="fa fa-angle-right" style="font-size: 21px;"></i></a>
                <div class="row">
                    <div class="col-md-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/js/bs-init.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"></script>
    <script src="{{asset('assets/js/javascript.js')}}"></script>
    @yield('jspage')
</body>

</html>
