@extends('layouts.appDash')
@section('title') Gestion Recettes @endsection
@section('csspage')
    <link href="{{asset('backassets/plugins/summernote/summernote.css')}}" rel="stylesheet" />
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>Liste des recettes</b></h4>

                @if($recipes->count())
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
                        @foreach($recipes as $recipe)
                            <tr>
                                <td><img class="img-fluid" data-bss-hover-animate="pulse" src="{{image_url('uploads/recipe_images/'.$recipe->image)}}" alt="alt text here" style="border: 1px solid rgb(135,135,135) ; height: 100px;"></td>
                                <td>{{$recipe->title}} </td>
                                <td>{{$recipe->author_name}}</td>
                                <td>{{$recipe->category}}</td>
                                <td>{{date('d-m-Y',strtotime($recipe->created_at))}}</td>
                                <td >
                                    <a class="btn btn-primary" role="button" href="{{route('front.single_recipe',['id' => $recipe->id])}}"> <i class="fa fa-eye"></i> </a>
                                    <a class="btn btn-info" role="button" href="{{route('dash.modifRecipe',['id' => $recipe->id])}}"> <i class="fa fa-pencil"></i> </a>
                                    <form style="display: inline" method="POST" action="{{route('dash.deleteRecipe',['recipe_id' => $recipe->id])}}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger" role="button">
                                            <i class="fa fa-trash"></i> </button>
                                    </form>
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
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>Ajouter une recette</b></h4>

                <div class="row" style="margin-top: 15px;">
                    <form role="form" action="{{route('dash.ajouterRecipe')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="image1">Image Principale</label>
                            <input class="filestyle" data-input="false" id="image1" type="file" name="image">
                        </div>

                        <div class="form-group">
                            <label for="title">Titre de la recette</label>
                            <input type="text" name="title" required id="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="author">Auteur</label>
                            <input type="text" name="author_name" required id="author" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="category">Catégorie de la recette</label>
                            <select name="category" id="category" class="form-control">
                                <option selected value="vegetarien">végétarien</option>
                                <option value="glutenFree">Sans gluten</option>
                                <option value="PlantB">Plant-B</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tprepare">Durée de preparation</label>
                            <input type="number" class="form-control" name="preparation_time" id="tprepare">
                        </div>
                        <div class="form-group">
                            <label for="nbrperson">Nombre de personnes</label>
                            <input type="number" class="form-control" name="number_person" id="nbrperson">
                        </div>

                        <div class="form-group">
                            <label for="body1">Contenu de la recette</label>
                            <textarea class="form-control summernote" name="body" id="body1" cols="30" rows="5"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h3>Etapes de la recettes</h3>
                                <div id="js-etapes-container" >
                                    <div class="js-etape-1">
                                        <div class="form-group">
                                            <label for="etape1">Etape 1</label>
                                            <textarea class="form-control" name="etapes[]" id="etape1" cols="30" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <button type="button" class="btn btn-primary waves-effect waves-light" id="js-btn-add-etape" style="margin-top:10px;">Ajouter Etape</button>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tip">Astuces</label>
                            <textarea class="form-control" name="tip" id="tip" cols="30" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-block" type="submit">Ajouter Recette</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('jspage')
    <script src="{{asset('backassets/plugins/summernote/summernote.min.js')}}"></script>
    <script src="{{asset('backassets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backassets/plugins/notifyjs/js/notify.js')}}"></script>
    <script src="{{asset('backassets/plugins/notifications/notify-metro.js')}}"></script>
    <script>
        $('.summernote').summernote({
            height: 350,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: false                 // set focus to editable area after initializing summernote
        });
        @if(session()->has('success'))
        $.Notification.notify('success','top right','Youpi', '{{session()->get('success')}}');
        @endif
        $('body').on('click','#js-btn-add-etape', function() {
            let indexElement = $('div[class^=js-etape]:last');
            let tableau = indexElement.attr('class').split('-');
            let index = parseInt(tableau[2]);
            index++;
            $('#js-etapes-container').append(`
<div class="js-etape-`+ index +`">
    <div class="form-group">
        <label for="etape`+ index +`">Etape `+ index +`</label>
        <div class="pull-right">
            <button type="button" style="display: inline;margin-bottom: 2px;" class="btn btn-danger js-delete-etape"><i class="fa fa-trash"></i>Supprimer</button>
        </div>
        <textarea class="form-control" name="etapes[]" id="etape`+ index +`" cols="30" rows="5"></textarea>
    </div>
</div>
            `);
        });

        $('body').on('click','.js-delete-etape', function() {
            $(this).parent().parent().parent().remove();
        });

    </script>
@endsection
