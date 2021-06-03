@extends('layouts.appDash')
@section('title')Gestion recipe@endsection
@section('csspage') @endsection
@section('content')

<h3>Gestion recipe</h3>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Titre</th>
            <th scope="col">Auteur</th>
            <th scope="col">Categorie</th>
            <th scope="col">Date de publication</th>
            <th scope="col">Image</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($recipes as $recipe)
        <tr>
            <td>{{$recipe->title}} </td>
            <td>{{$recipe->author_name}}</td>
            <td>{{$recipe->category}}</td>
            <td>{{date('d-m-Y',strtotime($recipe->created_at))}}</td>
            <td><img class="img-fluid" data-bss-hover-animate="pulse" src="{{asset('uploads/article_images/'.$recipe->image)}}" alt="alt text here" style="border: 1px solid rgb(135,135,135) ; height: 100px;"></td>
            <td> <a class="btn btn-primary signin" role="button" href="{{route('front.single_recipe',['id' => $recipe->id])}}"> Consulter </a></td>
            <td>
                <form method="POST" action="{{route('dash.deleteRecipe',['recipe_id' => $recipe->id])}}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger signin" role="button">
                        Supprimer </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<form method="post" id="add-recipe" action="{{route('dash.ajouterRecipe')}}" enctype="multipart/form-data">
    @csrf
    <div id="booking_fieldset">
        <div class="block">
            <div class="block-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="title">Titre du recette <span class="text-danger">*</span>
                            </label>
                            <input type="text" required name="title" class="form-control" id="title" title="Titre recette" placeholder="Titre recette">
                        </div>
                    </div>
                </div>
                <div class="row-separator"></div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="title">Auteur<span class="text-danger">*</span>
                            </label>
                            <input type="text" required name="author_name" class="form-control" id="title" title="Auteur recette" placeholder="Auteur recette">
                        </div>
                    </div>
                </div>
                <div class="row-separator"></div>
                <label for="title">Categorie<span class="text-danger">*</span>
                    <select name="category" id="category-select">
                        <option value="vegetarien">végétarien</option>
                        <option value="glutenFree">Sans gluten</option>
                        <option value="PlantB">Plant-B</option>
                    </select>
                    <div class="row-separator"></div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="title">Durée de preparation<span class="text-danger">*</span>
                                </label>
                                <input type="number" required name="preparation_time" class="form-control" id="title" title="Durée de préparation" placeholder="Durée de préparation">
                            </div>
                        </div>
                    </div>
                    <div class="row-separator"></div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="title">Nombre de personnes<span class="text-danger">*</span>
                                </label>
                                <input type="number" required name="number_person" class="form-control" id="title" title="Nombre de personnes" placeholder="Nombre de personnes">
                            </div>
                        </div>
                    </div>
                    <div class="row-separator"></div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="title">Contenu<span class="text-danger">*</span>
                                </label>
                                <input type="text" required name="body" class="form-control" id="title" title="Contenu" placeholder="Contenu">
                            </div>
                        </div>
                    </div>
                    <div class="row-separator"></div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="title">Description<span class="text-danger">*</span>
                                </label>
                                <input type="text" required name="description" class="form-control" id="title" title="Description" placeholder="Description">
                            </div>
                        </div>
                    </div>
                    <div class="row-separator"></div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="title">Astuces<span class="text-danger">*</span>
                                </label>
                                <input type="text" required name="tip" class="form-control" id="title" title="Titre de l'article " placeholder="Titre de l'article ">
                            </div>
                        </div>
                    </div>
                    <input type="file" name="image" onchange="loadFile(event)" id="recipe_gallery">
                    <div class="row-separator"></div>
                    <div class="row " id="article_img_prev" style="display: none; margin-top: 14px;"></div>
                    <div class="row-separator"></div>
                    <div class="row">
                        <div class="block-right">
                            <button type="submit" class="btn btn-success btn-lg">Ajouter recette</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</form><!-- #add-property-form -->

@endsection
@section('jspage') @endsection