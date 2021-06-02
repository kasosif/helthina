@extends('layouts.app')
@section('title') Accueil @endsection
@section('csspage') @endsection
@section('acceuil_active') active @endsection
@section('content')
    <section class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <h1 class="header-text">Balance votre vie,<br>Manger Healthy<br></h1>
                    <p class="lead">Trouvez le meilleur endroit pour savourer votre prochain repas sain<br></p><a class="btn btn-secondary home-btn" role="button" href="{{route('front.adresse')}}" style="box-shadow: 0px 0px 19px rgba(33,33,33,0.25);margin-left: 0px;margin-top: 10px;">Découvrir<br></a>
                </div>
                <div class="col-md-6" style="text-align: center;"><img class="img-fluid homeimg" src="assets/img/blog bg.png"></div>
            </div>
        </div>
    </section>
    <section class="m-auto features-boxed" data-aos="fade-up" data-aos-duration="500">
        <div class="container-xl text-center fea" data-aos="fade-up" data-aos-duration="500">
            <div class="col">
                <h1 class="article-header">Rejoignez notre communauté et bénéficiez de&nbsp; &nbsp;<br></h1>
            </div>
            <div class="row justify-content-center align-items-center features">
                <div class="col-sm-6 col-md-5 col-lg-4 item" data-aos="fade-up" data-aos-duration="500">
                    <div data-bss-hover-animate="pulse" class="box-feat box" style="box-shadow: 0px 5px 20px rgba(49,52,55,0.07);"><img src="assets/img/file-1.svg">
                        <h3 class="name" style="margin-top: 25px;">Articles Healthina<br></h3>
                        <p class="description">Nous mettons à votre disposition des recettes healthy de différents régimes alimentaires</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item" data-aos="fade-up" data-aos-duration="500" data-aos-delay="250">
                    <div data-bss-hover-animate="pulse" class="box-feat box" style="box-shadow: 0px 5px 20px rgba(49,52,55,0.07);"><img src="assets/img/heart-1.svg">
                        <h3 class="name" style="margin-top: 25px;">Recettes Healthy<br></h3>
                        <p class="description">Tous ce que vous devez savoir sur votre corps ainsi que votre bouffe.<br><br></p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item" data-aos="fade-up" data-aos-duration="500" data-aos-delay="500">
                    <div data-bss-hover-animate="pulse" class="box-feat box" style="box-shadow: 0px 5px 20px rgba(49,52,55,0.07);"><img src="assets/img/message-3.svg">
                        <h3 class="name" style="margin-top: 25px;">Forum (Bientot disponible)<br></h3>
                        <p class="description">Lire et agir, vous allez bientot avoir le pouvoir de partager vos expériences avec nous<br><br></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="m-auto">
        <div class="container-sm cont1">
            <div class="row sec2">
                <div class="col-auto" data-aos="zoom-in-up" data-aos-duration="500"><img class="img-fluid box" src="assets/img/art1.jpg"></div>
                <div class="col" data-aos="fade-left" data-aos-duration="950">
                    <h2>Pourquoi passer à une alimentation saine ?&nbsp;<img src="assets/img/pulse-1.svg" style="width: 75px;"><br></h2>
                    <p>Les aliments ont le pouvoir de nous donner de l’énergie et de nous fournir les nutriments essentiels. Ils nous aident ainsi à rester en santé. Cependant, certains aliments devraient se retrouver en quantité limitée dans notre assiette, <br></p><a class="btn btn-secondary" role="button" data-bss-hover-animate="pulse" href="{{route('front.whyhealthy')}}" style="margin-top: 16px;margin-left: 0px;">Plus d'info</a>
                    <div></div>
                </div>
            </div>
        </div>
    </section>
    @if($latest_articles->count())
        <div class="container cont2" data-aos="fade-up" data-aos-duration="500">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-12">
                    <h1 class="article-header">Nouveaux articles&nbsp;<img data-aos="fade-up-right" data-aos-duration="950" src="assets/img/rocket-1.svg" style="width: 75px;">&nbsp;<br></h1>
                </div>
            </div>
            <div class="row art-box">
                @foreach($latest_articles as $article)
                    <div class="col">
                        <img class="img-fluid box" data-bss-hover-animate="pulse" src="{{asset('uploads/article_images/'.$article->images)}}">
                        <a href="{{route('front.single_article',['id' => $article->id])}}">
                            <p class="artcle-sous">{{$article->title}}<br></p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    <div class="container" data-aos="fade-up" data-aos-duration="500" style="margin-top: 75px;">
        <div class="row">
            <div class="col-md-12">
                <h1 style="text-align: center;">Forum&nbsp;&nbsp;<img src="assets/img/message-4.svg" style="width: 50px;"><img src="assets/img/message-3.svg"><br></h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="blog-slider">
                    <div class="blog-slider__wrp swiper-wrapper">
                        <div class="blog-slider__item swiper-slide">
                            <div></div>
                            <div class="blog-slider__img"><img src="assets/img/perso%201.png"></div>
                            <div class="blog-slider__content"><span class="blog-slider__code">22 mai 2021</span><div class="blog-slider__title">comment une alimentation saine change ma vie
                                </div><div class="blog-slider__text">c'est ainsi que le mode de vie alimentaire sain a changé toute ma vie après 24 ans de dépendance à la malbouffe et aux mauvaises habitudes
                                </div><a class="class=&quot;blog-slider__button" href="{{route('front.forum')}}">lire la suiite</a></div>
                        </div>
                        <div class="blog-slider__item swiper-slide">
                            <div></div>
                            <div class="blog-slider__img">
                                <img src="assets/img/perso3.png">
                            </div>
                            <div class="blog-slider__content">
                                <span class="blog-slider__code">26 December 2019</span>
                                <div class="blog-slider__title">Lorem Ipsum Dolor</div>
                                <div class="blog-slider__text">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Recusandae voluptate repellendus magni illo ea animi?
                                </div>
                                <a class="class=&quot;blog-slider__button" href="{{route('front.forum')}}">READ MORE</a>
                            </div>
                        </div>
                        <div class="blog-slider__item swiper-slide">
                            <div></div>
                            <div class="blog-slider__img"><img src="assets/img/perso%202.png"></div>
                            <div class="blog-slider__content"><span class="blog-slider__code">26 December 2019</span><div class="blog-slider__title">Lorem Ipsum Dolor</div><div class="blog-slider__text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Recusandae voluptate repellendus magni illo ea animi? </div><a class="class=&quot;blog-slider__button" href="{{route('front.forum')}}">READ MORE</a></div>
                        </div>
                        <div class="blog-slider__pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($most_rated_recipes->count())
        <section class="team-boxed">
            <div class="container" data-aos="fade-up" data-aos-duration="950">
                <div class="intro">
                    <h1 class="text-center" data-aos="fade-up" data-aos-duration="950">Nos Recettes <br></h1>
                </div>
                <p class="text-center" data-aos="fade-up" data-aos-duration="950" style="margin-top: 25px;">Choix Team Healthina<br></p>
                <div class="row text-center people" data-aos="fade-up" data-aos-duration="950">
                    @foreach($most_rated_recipes as $recipe)
                        <div class="col-md-6 col-lg-4 item" style="margin-top: 100px;">
                            <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" class="box1">
                                <img class="rounded-circle img-fluid" data-bss-hover-animate="pulse" src="{{asset('uploads/recipe_images/'.$recipe->image)}}" style="margin-top: -100px;width: 159px;">
                                <h3 class="name"><strong>{{$recipe->title}}</strong><br></h3>
                                <p class="title">
                                    {!! generate_stars($recipe->getScore(),'<i class="fa fa-star" style="color: var(--yellow);"></i>','<i class="fa fa-star-o"></i>') !!}
                                </p>
                                <p class="description">{{$recipe->description}}<br></p>
                                <a class="btn btn-secondary btn-action" role="button" data-bss-hover-animate="pulse" style="margin: 40px;" href="{{route('front.single_recipe',['id' => $recipe->id])}}">Voir<br></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection
@section('jspage')  @endsection
