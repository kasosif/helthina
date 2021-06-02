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
            <div class="col-md-4 col-lg-3 item">
                <div data-bss-hover-animate="pulse" class="box" style="background: url(&quot;assets/img/ivy.jpg&quot;) center / cover no-repeat;border-radius: 10px;border-bottom-left-radius: 0px;border-bottom-right-radius: 50px;border-top-right-radius: 0px;border-top-left-radius: 50px;">
                    <div class="cover" style="background: rgba(206,20,253,0.21);">
                        <h3 class="name">Ivy<br></h3>
                        <p class="title">Restaurant<br></p>
                        <div class="social"><a href="https://www.facebook.com/ivyfoodanddrink/"><i class="fa fa-facebook-official" style="font-size: 28px;"></i></a><a href="#"></a><a href="https://www.instagram.com/ivy_food_and_drink/"><i class="fa fa-instagram" style="font-size: 28px;"></i></a></div>
                    </div>
                </div>
                <h5 class="text-left adresse-name" style="margin-top: 25px;"><strong>Ivy</strong><br></h5>
                <p class="lead">La Marsa&nbsp;&nbsp;<a href="https://www.google.com/maps/place/Ivy+Coffee+Shop+%26+Restaurant/@36.8842199,10.3289897,17z/data=!3m1!4b1!4m5!3m4!1s0x12e2b5eb5c95dc11:0x3dec7cf5ac316c1e!8m2!3d36.8842199!4d10.3311784"><i class="fa fa-map-marker localisation" style="color: var(--green);"></i></a>&nbsp;</p>
            </div>
            <div class="col-md-4 col-lg-3 item">
                <div data-bss-hover-animate="pulse" class="box" style="background: url(&quot;assets/img/breath.jpg&quot;) center / cover no-repeat">
                    <div class="cover" style="background: rgba(253,126,20,0.37);">
                        <h3 class="name">Breath Salade<br></h3>
                        <p class="title">Restaurant<br></p>
                        <div class="social"><a href="https://www.facebook.com/Breath.Salad.Bar/"><i class="fa fa-facebook-official" style="font-size: 28px;"></i></a><a href="#"></a><a href="https://www.instagram.com/breathsaladbar/"><i class="fa fa-instagram" style="font-size: 28px;"></i></a></div>
                    </div>
                </div>
                <h5 class="adresse-name" style="margin-top: 25px;"><strong>Breath salade</strong><br></h5>
                <p class="lead localisation">La Marsa&nbsp; &nbsp;<a href="https://www.google.com/maps/place/Bar+Salad+%22Breath%22/@36.8718562,10.3251703,15z/data=!4m2!3m1!1s0x0:0xd1ce459eba2d142c?sa=X&amp;ved=2ahUKEwiuhePp_ObwAhWLhP0HHZJ_AX8Q_BIwFHoECDoQBQ"><i class="fa fa-map-marker" style="color: var(--green);"></i></a><br></p>
            </div>
            <div class="col-md-4 col-lg-3 item">
                <div data-bss-hover-animate="pulse" class="box" style="background: url(&quot;assets/img/166453071_783455305631796_3969645149366580149_n.jpg&quot;) center / cover no-repeat;">
                    <div class="cover" style="background: rgba(20,141,253,0.37);">
                        <h3 class="name">Kenko</h3>
                        <p class="title">Restaurant<br></p>
                        <div class="social"><a href="https://www.facebook.com/KenkofoodB"><i class="fa fa-facebook-official" style="font-size: 28px;"></i></a><a href="#"></a><a href="https://www.instagram.com/kenko_foodbar/"><i class="fa fa-instagram" style="font-size: 28px;"></i></a></div>
                    </div>
                </div>
                <h5 class="adresse-name" style="margin-top: 25px;"><strong>Kenkō</strong><br></h5>
                <p class="lead">Carthage&nbsp; &nbsp;<a href="https://www.google.com/maps/place/Kenk%C5%8D+food+bar/@36.8814864,10.3326832,15z/data=!4m5!3m4!1s0x0:0xd3d6626e4f572024!8m2!3d36.8814817!4d10.3327234"><i class="fa fa-map-marker localisation" style="color: var(--green);"></i></a><br></p>
            </div>
            <div class="col-md-4 col-lg-3 item">
                <div data-bss-disabled-mobile="true" data-bss-hover-animate="pulse" class="box" style="background: url(&quot;assets/img/81902843_123298402247935_2693525679821330150_n.jpg&quot;) center / cover no-repeat;">
                    <div class="cover" style="background: rgba(4,192,143,0.33);">
                        <h3 class="name"><strong>Oh.em.gee</strong><br></h3>
                        <p class="title">Restaurant<br></p>
                        <div class="social"><a href="https://www.facebook.com/oh.em.gee.tn"><i class="fa fa-facebook-official" style="font-size: 28px;"></i></a><a href="#"></a><a href="https://www.instagram.com/oh.em.gee.tn/"><i class="fa fa-instagram" style="font-size: 28px;"></i></a></div>
                    </div>
                </div>
                <h5 class="adresse-name" style="margin-top: 25px;"><strong>Oh.em.gee</strong><br></h5>
                <p class="lead">La Marsa&nbsp; &nbsp;<a href="https://www.google.com/maps/place/Oh.+Em.+Gee!/@36.8838436,10.33118,17z/data=!3m1!4b1!4m5!3m4!1s0x12e2b5ba1a8b41f3:0xe84eb71fa2101f9e!8m2!3d36.8838436!4d10.3333687"><i class="fa fa-map-marker localisation" style="color: var(--green);"></i></a></p>
            </div>
            <div class="col">
                <nav class="d-xl-flex justify-content-xl-center" id="pagination" style="text-align: center;font-family: 'poppins', ;font-size: 16px;">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                    </ul>
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