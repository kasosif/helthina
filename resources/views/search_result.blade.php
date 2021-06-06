@extends('layouts.app')
@section('title')
    Résultat de recherche
@endsection
@section('csspage') @endsection
@section('content')
    <section style="text-align: center;background: rgba(252,252,252,0);">
        <div class="container" style="text-align: center;">
            @if($count)
                @if($recipes->count())
                    <div class="recipes-result">
                        <div class="row">
                            <div class="col" style="padding: 0px;height: 49px;margin-top: 50px;">
                                <h1 class="text-center" style="margin-top: -15px;">
                                    Recette(s) trouvée(s)
                                    <br>
                                </h1>
                            </div>
                        </div>
                        <div class="row" style="text-align: center;margin-top: 80px;">
                            @foreach($recipes as $recipe)
                                <div class="col-md-3 text-center @if($loop->iteration % 2 == 0) recettes-box2 @else recettes-box @endif " data-aos="fade-up" data-aos-duration="500" data-aos-delay="250">
                                    <img class="img-fluid ima" src="{{image_url('uploads/recipe_images/'.$recipe->image)}}">
                                    <p style="margin-top: 25px;">Par : {{$recipe->author_name}}<br></p>
                                    @if(!auth()->check())
                                        <a href="{{route('login')}}"><i class="fa fa-bookmark-o" style="font-size: 28px;"></i></a>
                                    @elseif(auth()->user()->role != "ADMIN")
                                        @if(auth()->user()->favorites()->where('recipes.id',$recipe->id)->exists())
                                            <a href="{{route('front.unfav_recipe',['id' => $recipe->id])}}" class="btn btn-success" id="save" type="button">unsave&nbsp;<i class="fa fa-bookmark save" id="unsave"></i></a>
                                        @else
                                            <a href="{{route('front.fav_recipe',['id' => $recipe->id])}}" class="btn btn-success" id="save" type="button">save&nbsp;<i class="fa fa-bookmark-o save" id="save"></i></a>
                                        @endif
                                    @endif
                                    <p style="color: var(--warning);margin-top: 25px;">
                                        {!! generate_stars($recipe->getScore(),'<i class="fa fa-star" style="color: var(--yellow);"></i>','<i class="fa fa-star-o"></i>') !!}
                                    </p>
                                    <h1 class="recettes-titre">{!! preg_replace('/'.$search.'/i', '<span style="background:yellow;"><b>$0</b></span>', $recipe->title)!!}<br></h1>
                                    <p class="recettes-soustitre">{{$recipe->category}} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{$recipe->preparation_time}}min<br></p>
                                    <a class="btn btn-secondary" role="button" data-bss-hover-animate="pulse" style="font-family: 'poppins', serif;border-radius: 25px;width: 120.25px;" href="{{route('front.single_recipe',['id' => $recipe->id])}}">Voir</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                @if($articles->count())
                    <div class="articles-result">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 data-aos="zoom-in" class="article-header" style="font-size: 36px;">Article(s) trouvé(s)<br></h1>
                            </div>
                        </div>
                        <div class="row article-bar" data-aos="fade-up" data-aos-delay="250">
                            @foreach($articles as $article)
                                <div class="col-md-3 artcl-box">
                                    <img class="img-fluid box" src="{{image_url('uploads/article_images/'.$article->image,239,239)}}">
                                    <a href="{{route('front.single_article',['id' => $article->id])}}">
                                        <p class="artcle-sous">{!!preg_replace('/'.$search.'/i', '<span style="background:yellow;"><b>$0</b></span>', $article->title)!!}</p>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                @if($adresses->count())
                    <div class="addresses-result">
                        <div class="intro">
                            <h2 class="text-center" data-aos="zoom-in" data-aos-duration="500" style="margin: 10px;">Adresse(s) Trouvée(s)<br></h2>
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
                                            <h3 class="name">{!! preg_replace('/'.$search.'/i', '<span style="background:yellow;"><b>$0</b></span>', $adresse->name) !!}<br></h3>
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
                    </div>
                @endif
                @if($wadresses->count())
                    <div class="waddresses-result">
                        <div class="intro">
                            <h2 class="text-center" data-aos="zoom-in" data-aos-duration="500" style="margin: 10px;">Site(s) Trouvée(s)<br></h2>
                        </div>
                        <div class="d-flex flex-row multiple-item-slider" style="margin-top: 40px !important;">
                            @foreach($wadresses as $wadresse)
                                <div class="justify-content-center spacer-slider">
                                    <figure class="figure">
                                        <a href="{{$wadresse->map_link}}">
                                            <img class="img-fluid" data-bss-hover-animate="pulse" src="{{image_url('uploads/web_adresse_images/'.$wadresse->image)}}" alt="alt text here" style="border: 1px solid rgb(135,135,135) ;">
                                        </a>
                                    </figure>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @else
                <div class="row" style="padding: 50px;">
                    <div class="col">
                        <div class="alert alert-warning">
                            Aucun Résultat trouvé ..., <a href="{{route('front.home')}}">Revenir à l'accueil</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
@section('jspage') @endsection
