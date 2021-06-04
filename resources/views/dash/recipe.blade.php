@extends('layouts.appDash')
@section('title') Recettes favorites @endsection
@section('csspage') @endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>Liste des recettes favorites</b></h4>

                @if($favorits->count())
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Titre</th>
                            <th>Auteur</th>
                            <th>Categorie</th>
                            <th>Date de publication</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($favorits as $recipe)
                            <tr>
                                <td>{{$recipe->title}} </td>
                                <td>{{$recipe->author_name}}</td>
                                <td>{{$recipe->category}}</td>
                                <td>{{date('d-m-Y',strtotime($recipe->created_at))}}</td>
                                <td><img class="img-fluid" data-bss-hover-animate="pulse" src="{{asset('uploads/recipe_images/'.$recipe->image)}}" alt="alt text here" style="border: 1px solid rgb(135,135,135) ; height: 100px;"></td>
                                <td >
                                    <a class="btn btn-primary" role="button" href="{{route('front.single_recipe',['id' => $recipe->id])}}"> <i class="fa fa-eye"></i> </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-info">
                        Aucune Recette trouvée
                    </div>
                @endif
            </div>
        </div>
    </div>


@endsection
@section('jspage') @endsection
