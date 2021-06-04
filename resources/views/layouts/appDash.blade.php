<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Jyhen">
    <title>Healthina - @yield('title')</title>

    <link href="{{asset('backassets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backassets/css/core.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backassets/css/components.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backassets/css/icons.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backassets/css/pages.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backassets/css/responsive.css')}}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="{{asset('backassets/js/modernizr.min.js')}}"></script>

    @yield('csspage')

</head>

<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">

        <!-- LOGO -->
        <div class="topbar-left">
            <div class="text-center">
                <a href="{{route('front.home')}}" class="logo">
                    <img src="{{asset('assets/img/Asset 9.png')}}" alt="" style="width: 50px;">
                </a>
                <!-- Image Logo here -->
                <!--<a href="index.html" class="logo">-->
                <!--<i class="icon-c-logo"> <img src="assets/images/logo_sm.png" height="42"/> </i>-->
                <!--<span><img src="assets/images/logo_light.png" height="20"/></span>-->
                <!--</a>-->
            </div>
        </div>

        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="">
                    <div class="pull-left">
                        <button class="button-menu-mobile open-left waves-effect waves-light" style="color: #000">
                            <i class="md md-menu"></i>
                        </button>
                        <span class="clearfix"></span>
                    </div>


                    <ul class="nav navbar-nav navbar-right pull-right">
                        <li class="dropdown top-menu-item-xs">
                            <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><img src="{{asset('assets/img/user-avatar.png')}}" alt="user-img" class="img-circle"> </a>
                            <ul class="dropdown-menu">
                                <li><a onclick="document.getElementById('logout-form').submit();" href="javascript:void(0)"><i class="ti-power-off m-r-10 text-danger"></i> Logout</a></li>
                                <form id="logout-form" action="{{route('logout')}}" style="display: none;" method="post">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->

    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">
            <!--- Divider -->
            <div id="sidebar-menu">
                <ul>

                    <li class="menu-title" >
                        <h4 style="text-align: center">
                            <strong>
                                <img src="{{asset('assets/img/user-avatar.png')}}" width="100px" style="text-align: center">
                                <br>
                                <span style="color: #5fbeaa">{{ucfirst(auth()->user()->name)}}</span>
                            </strong>
                        </h4>
                    </li>

                    @if(auth()->user()->role == "ADMIN")
                        <li>
                            <a href="{{route('dash.gestionArticle')}}" class="waves-effect">
                                <i class="ti-write"></i> <span> Gestion articles </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('dash.gestionRecipe')}}" class="waves-effect">
                                <i class="fa fa-cutlery"></i> <span> Gestion recettes </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('dash.gestionAdresse')}}" class="waves-effect">
                                <i class="ti-map"></i> <span>Gestion adresses</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('dash.gestionWebAdresse')}}" class="waves-effect">
                                <i class="ti-world"></i> <span> Gestion webadresses </span>
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="{{route('dash.article')}}" class="waves-effect">
                                <i class="ti-write"></i> <span>Articles aimé</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('dash.recipe')}}" class="waves-effect">
                                <i class="fa fa-cutlery"></i> <span>Recettes favorites</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('dash.comment')}}" class="waves-effect">
                                <i class="ti-map"></i> <span>Commentaires</span>
                            </a>
                        </li>
                    @endif

                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                @yield('content')
            </div> <!-- container -->

        </div> <!-- content -->

        <footer class="footer">
            © {{date('Y')}}. All rights reserved to Healthina.
        </footer>

    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="{{asset('backassets/js/jquery.min.js')}}"></script>
<script src="{{asset('backassets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('backassets/js/detect.js')}}"></script>
<script src="{{asset('backassets/js/fastclick.js')}}"></script>
<script src="{{asset('backassets/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('backassets/js/jquery.blockUI.js')}}"></script>
<script src="{{asset('backassets/js/waves.js')}}"></script>
<script src="{{asset('backassets/js/wow.min.js')}}"></script>
<script src="{{asset('backassets/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('backassets/js/jquery.scrollTo.min.js')}}"></script>


<script src="{{asset('backassets/js/jquery.core.js')}}"></script>
<script src="{{asset('backassets/js/jquery.app.js')}}"></script>
@yield('jspage')
</body>
</html>
