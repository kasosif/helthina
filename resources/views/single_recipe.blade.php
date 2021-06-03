@extends('layouts.app')
@section('title') {{$recipe->title}} @endsection
@section('content')
    <div class="container recettes-box3" style="font-family: Poppins, sans-;">
        <div class="row">
            <div class="col">
                <h1>
                    {{$recipe->title}}&nbsp;
                    @if(auth()->user()->favorites()->where('recipes.id',$recipe->id)->exists())
                        <a href="{{route('front.unfav_recipe',['id' => $recipe->id])}}" class="btn btn-success" id="save" type="button">unsave&nbsp;<i class="fa fa-bookmark save" id="unsave"></i></a>
                    @else
                        <a href="{{route('front.fav_recipe',['id' => $recipe->id])}}" class="btn btn-success" id="save" type="button">save&nbsp;<i class="fa fa-bookmark-o save" id="save"></i></a>
                    @endif
                </h1>
                <p><strong>{{$recipe->number_person}} personne(s)&nbsp;&nbsp;</strong><i class="fa fa-user" style="color: var(--orange);"></i><strong>&nbsp; | {{$recipe->preparation_time}} Min&nbsp;&nbsp;</strong><i class="fa fa-clock-o" style="color: var(--orange);"></i><br /></p>
                {!! $recipe->body !!}
                {{--                <p class="ingred">Ingrédient<br /></p>--}}
                {{--                <p class="ingred">2 grosses tomates ,coupées tranches&nbsp;<br /></p>--}}
                {{--                <p class="ingred">2 cuillères à soupe de basilic frais haché finement<br /></p>--}}
                {{--                <p class="ingred">1 gousse d'ail émincée<br /></p>--}}
                {{--                <p class="ingred">2 cuillères à soupe d'huile d'olive extra vierge<br /></p>--}}
                {{--                <p class="ingred">1 1/4 tasse de chapelure fraîche grossière d'une baguette<br /></p>--}}
                {{--                <p class="ingred">1/3 tasse de parmesan râpé<br /></p>--}}
            </div>
            <div class="col-md-6"><img class="img-fluid" src="{{asset('uploads/recipe_images/'.$recipe->image)}}" /></div>
        </div>
        <h1>Préparation<br /></h1>
        <div class="row prep-box" data-aos="fade-up">
            <div class="col">
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
    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="title">{{__('Laissez une evaluation')}}</h3>
                    </div>
                    <div class="card-body">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="article-header">Autres recettes</h1>
            </div>
        </div>
        <div class="row">
            @foreach($recipes_alike as $re)
                <div class="col-md-4">
                    <img class="img-fluid" src="{{asset('uploads/recipe_images/'.$re->image)}}" />
                    <a href="{{route('front.single_recipe',['id' => $re->id])}}">
                        <p class="artcle-sous">{{$re->title}}<br /></p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

@endsection
@section('jspage') @endsection
