@extends('layouts.app')
@section('title')
    Recettes
    @switch(request()->route('categorie'))
        @case('vegetarien')
        végétarien
        @break
        @case('glutenFree')
        Gluten free
        @break
        @case('PlantB')
        Plant B
        @break
    @endswitch
@endsection
@section('csspage') @endsection
@section('recettes_active') active @endsection
@section('content')
    <section style="text-align: center;background: rgba(252,252,252,0);">
        <div class="container" style="text-align: center;">
            <div class="row">
                <div class="col" style="padding: 0px;height: 49px;margin-top: 50px;">
                    <h1 class="text-center" style="margin-top: -15px;">
                        @switch(request()->route('categorie'))
                            @case('vegetarien')
                            Des recettes&nbsp;végétarien simple
                            @break
                            @case('glutenFree')
                            Des recettes Gluten free simple
                            @break
                            @case('PlantB')
                            Des recettes Plant B simple
                            @break
                        @endswitch
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
                        <h1 class="recettes-titre">{{$recipe->title}}<br></h1>
                        <p class="recettes-soustitre">{{$recipe->category}} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{$recipe->preparation_time}}min<br></p>
                        <a class="btn btn-secondary" role="button" data-bss-hover-animate="pulse" style="font-family: 'poppins', serif;border-radius: 25px;width: 120.25px;" href="{{route('front.single_recipe',['id' => $recipe->id])}}">Voir</a>
                    </div>
                @endforeach
            </div>
        </div>
        <nav class="d-xl-flex justify-content-xl-center" id="pagination" style="text-align: center;font-family: 'poppins', serif;font-size: 16px;">
            {{$recipes->links()}}
        </nav>
    </section>
@endsection
@section('jspage') @endsection
