@extends('layouts.app')
@section('title') Bonne Adresses @endsection
@section('csspage') @endsection
@section('content')

    <section class="team-grid">
        <div class="container">
            <div class="intro">
                <h2 class="text-center" data-aos="zoom-in" data-aos-duration="500" style="margin: 10px;">Bonnes adresses&nbsp;<img src="assets/img/map-1.svg" style="width: 50px;margin-top: -25px;"><br></h2>
                <p class="lead text-center" data-aos="fade" data-aos-duration="500" data-aos-delay="250">Trouvez le meilleur endroit pour savourer votre prochain repas sain<br></p>
            </div>
            <div class="row people" data-aos="fade-up" data-aos-duration="500" data-aos-delay="500">
                @foreach($adresses as $adresse)
                    <div class="col-md-4 col-lg-3 item">
                        <div data-bss-hover-animate="pulse" class="box" style="background: url('{{image_url("uploads/adresse_images/".$adresse->image)}}') center / cover no-repeat;border-radius: 10px;border-bottom-left-radius: 0px;border-bottom-right-radius: 50px;border-top-right-radius: 0px;border-top-left-radius: 50px;">
                            <div class="cover"
                            @switch($loop->iteration)
                                @case(1)
                            style="background: rgba(206,20,253,0.21);"
                                @break
                                 @case(2)
                                 style="background: rgba(253,126,20,0.37);"
                                @break
                                 @case(3)
                                 style="background: rgba(20,141,253,0.37);"
                                @break
                                 @case(4)
                                 style="background: rgba(4,192,143,0.33);"
                                @break
                                @endswitch
                            >
                                <h3 class="name">{{$adresse->name}}<br></h3>
                                <p class="title">Restaurant<br></p>
                                <div class="social">
                                    <a href="{{$adresse->fb_link}}"><i class="fa fa-facebook-official" style="font-size: 28px;"></i></a>
                                    <a href="#"></a><a href="{{$adresse->instagram_link}}"><i class="fa fa-instagram" style="font-size: 28px;"></i></a>
                                </div>
                            </div>
                        </div>
                        <h5 class="text-left adresse-name" style="margin-top: 25px;"><strong>{{$adresse->name}}</strong><br></h5>
                        <p class="lead">{{$adresse->localisation}}&nbsp;&nbsp;
                            <a href="{{$adresse->map_link}}"><i class="fa fa-map-marker localisation" style="color: var(--green);"></i></a>&nbsp;
                        </p>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col">
                    <nav class="d-xl-flex justify-content-xl-center" id="pagination" style="text-align: center;font-family: 'Poppins Sans', serif;font-size: 16px;">
                        {{$adresses->links()}}
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <div class="container" data-aos="fade-up" data-aos-duration="500">
        <div class="row">
            <div class="col text-center" style="text-align: left;">
                <h1 class="text-center">Choix de l'équipe Helthina&nbsp;&nbsp;<img src="assets/img/tick-1.svg" style="width: 50px;"><br></h1>
            </div>
        </div>
        <div class="row" style="margin-top: 50px;">
            <div class="col-md-6" style="text-align: center;"><img class="img-fluid box" src="assets/img/166453071_783455305631796_3969645149366580149_n.jpg" style="width: 500px;margin-bottom: 50px;"></div>
            <div class="col-md-6">
                <h1>Kenko L'un des endroits les plus adorables que les végétaliens veulent visiter<br></h1>
                <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>kenko&nbsp;&nbsp;</strong>est l'un des endroits les plus préférés que tout régime alimentaire sain devrait visiter, une ambiance très amicale, un bon service et le plus important des plats frais et sains, l'équipe helthina est vivement recommandée pour visiter kenko et savourer votre prochain repas sain&nbsp; &nbsp; &nbsp; &nbsp;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;2 membres de healthina passent la journée chez kenko et les retours sont bons, les produits utilisés dans les plats sont frais les plats respectent les mesures diététiques saines, une bonne décoration et un accueil chaleureux<br><br><br><a href="https://www.instagram.com/kenko_foodbar/"></a></p>
                <div class="row">
                    <div class="col">
                        <p style="margin-top: -10px;">Trouver kenko sur&nbsp;:&nbsp; &nbsp;<a href="https://www.instagram.com/kenko_foodbar/"><i class="fa fa-instagram" style="font-size: 28px;"></i></a>&nbsp; &nbsp; &nbsp;<a href="https://www.facebook.com/KenkofoodB"><i class="fa fa-facebook-official" style="font-size: 28px;"></i></a>&nbsp; &nbsp; &nbsp;<a href="https://www.google.com/maps/place/Kenk%C5%8D+food+bar/@36.8814864,10.3326832,15z/data=!4m5!3m4!1s0x0:0xd3d6626e4f572024!8m2!3d36.8814817!4d10.3327234"><i class="fa fa-map-marker" style="font-size: 28px;"></i></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Pourquoi devrais-je visiter Kenko<br></h1>
            </div>
        </div>
        <div class="row" style="margin-top: 50px;">
            <div class="col-md-3" data-bss-hover-animate="pulse" style="text-align: center;margin-top: 25px;">
                <h5 class="text-center" style="font-family: 'poppins', ;font-size: 18px;font-weight: bold;color: var(--gray-dark);">Nourriture délicieuse saine<br></h5><i class="fa fa-heart" style="text-align: center;font-size: 28px;margin-top: 15px;color: #97be11;"></i><img class="img-fluid" src="assets/img/pexels-jonathan-borba-2878741.jpg" style="margin-top: 25px;">
            </div>
            <div class="col-md-3" data-bss-hover-animate="pulse" style="text-align: center;margin-top: 25px;">
                <h5 class="text-center">belle ambiance<br></h5><i class="fa fa-music" style="text-align: center;font-size: 28px;margin-top: 15px;color: #97be11;"></i><img class="img-fluid" src="assets/img/pexels-olya-kobruseva-4676640.jpg" style="margin-top: 25px;">
            </div>
            <div class="col-md-3" data-bss-hover-animate="pulse" style="text-align: center;margin-top: 25px;">
                <h5 class="text-center">Bon service<br></h5><i class="fa fa-clock-o" style="text-align: center;font-size: 28px;margin-top: 15px;color: #97be11;"></i><img class="img-fluid" src="assets/img/pexels-dalila-dalprat-1843655.jpg" style="margin-top: 25px;">
            </div>
            <div class="col-md-3" data-bss-hover-animate="pulse" style="text-align: center;margin-top: 25px;">
                <h5>Pour les nuits en couple<br></h5><i class="fa fa-glass" style="text-align: center;font-size: 28px;margin-top: 15px;color: #97be11;"></i><img class="img-fluid" src="assets/img/pexels-cottonbro-4255490.jpg" style="margin-top: 25px;">
            </div>
        </div>
    </div>

@endsection
@section('jspage') @endsection
