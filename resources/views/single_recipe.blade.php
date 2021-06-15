@extends('layouts.app')
@section('title') {{$recipe->title}} @endsection
@section('content')
    <div class="container recettes-box3" style="font-family: Poppins, sans-;">
        <div class="row">
            <div class="col">
                <h1>
                    {{$recipe->title}}&nbsp;
                    @if(!auth()->check())
                        <a href="{{route('login')}}"><i class="fa fa-bookmark-o" style="font-size: 28px;"></i></a>
                    @elseif(auth()->user()->role != "ADMIN")
                        @if(auth()->user()->favorites()->where('recipes.id',$recipe->id)->exists())
                            <a href="{{route('front.unfav_recipe',['id' => $recipe->id])}}" class="btn btn-success" id="save" type="button">unsave&nbsp;<i class="fa fa-bookmark save" id="unsave"></i></a>
                        @else
                            <a href="{{route('front.fav_recipe',['id' => $recipe->id])}}" class="btn btn-success" id="save" type="button">save&nbsp;<i class="fa fa-bookmark-o save" id="save"></i></a>
                        @endif
                    @endif

                </h1>
                <p><strong>{{$recipe->number_person}} personne(s)&nbsp;&nbsp;</strong><i class="fa fa-user" style="color: var(--orange);"></i><strong>&nbsp; | {{$recipe->preparation_time}} Min&nbsp;&nbsp;</strong><i class="fa fa-clock-o" style="color: var(--orange);"></i><br /></p>
                {!! $recipe->body !!}
            </div>
            <div class="col-md-6">
                <img class="img-fluid" src="{{image_url('uploads/recipe_images/'.$recipe->image)}}" />
            </div>
        </div>
        <h1 style="margin-top: 3rem;">Préparation</h1>
        <div class="row" data-aos="fade-up">
            <div class="col" style="margin-top: -20px !important;">
                @foreach($recipe->steps as $step)
                    <h1 style="font-size: 29px; margin-top: 50px;"><i class="fa fa-check" style="color: var(--green);"></i>&nbsp;Etape {{$loop->iteration}}</h1>
                    <p>{{$step->body}}<br /></p>
                @endforeach
                @if($recipe->tip)
                    <h1 style="font-size: 28px; color: var(--gray-dark);"><i class="fa fa-star" style="color: var(--orange);"></i>&nbsp;Astuces<br /></h1>
                    <p style="font-family: 'poppins'; color: rgb(143, 143, 143);">
                        {{$recipe->tip}}<br />
                    </p>
                @endif
            </div>
            <div class="col-md-6"><img class="img-fluid" src="{{asset('assets/img/cooking2.png')}}" /></div>
        </div>
    </div>
    @if(!auth()->check())
    @elseif(auth()->user()->role == "ADMIN")
    @else
    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="title">{{__('Laissez une evaluation')}}</h3>
                    </div>
                    <div class="card-body">
                    @if(!auth()->user()->recipeRatings()->where('recipe_id', $recipe->id)->exists())
                        <div class="review-form-block">
                            <form class="form-msg" action="{{route('front.rate_recipe')}}" method="post">
                                @csrf()
                                <input type="hidden" name="recipe_id" value="{{$recipe->id}}">
                                <div class="stars">
                                    <div class="rating">
                                        <div class="form-group">
                                            <select name="mark" class="form-control" title="{{__('Evaluez cette recette')}}">
                                                <option value="1">1 {{__('Etoile')}} - {{__('Pauvre')}}</option>
                                                <option value="2">2 {{__('Etoile')}} -  {{__('Équitable')}}</option>
                                                <option value="3">3 {{__('Etoile')}} - {{__('Moyenne')}}</option>
                                                <option value="4">4 {{__('Etoile')}} - {{__('Bien')}}</option>
                                                <option value="5">5 {{__('Etoile')}} - {{__('Excellente')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <button style="border-radius: 25px;" class="btn btn-primary btn-xs-full-width">{{__('Send')}}</button>
                                </div>
                            </form>
                        </div>
                    @else
                    <div class="alert alert-success">Vous avez déjà noté cette recette</div>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="article-header">Autres recettes</h1>
            </div>
        </div>
        <div class="row" style="margin-top: 100px;">
            @foreach($recipes_alike as $re)
                <div class="col-md-4 text-center @if($loop->iteration % 2 == 0) recettes-box2 @else recettes-box @endif " data-aos="fade-up" data-aos-duration="500" data-aos-delay="250">
                    <img class="img-fluid ima" src="{{image_url('uploads/recipe_images/'.$re->image)}}">
                    <p style="margin-top: 25px;">Par : {{$re->author_name}}<br></p>
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
                        {!! generate_stars($re->getScore(),'<i class="fa fa-star" style="color: var(--yellow);"></i>','<i class="fa fa-star-o"></i>') !!}
                    </p>
                    <h1 class="recettes-titre">{{$re->title}}<br></h1>
                    <p class="recettes-soustitre">{{$re->category}} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{$re->preparation_time}}min<br></p>
                    <a class="btn btn-secondary" role="button" data-bss-hover-animate="pulse" style="font-family: 'poppins', serif;border-radius: 25px;width: 120.25px;" href="{{route('front.single_recipe',['id' => $re->id])}}">Voir</a>
                </div>
            @endforeach
        </div>
    </div>

@endsection
@section('jspage') @endsection
