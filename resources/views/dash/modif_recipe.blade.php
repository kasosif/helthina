@extends('layouts.appDash')
@section('title') Modification de la recette {{$recipe->title}} @endsection
@section('csspage')
    <link href="{{asset('backassets/plugins/summernote/summernote.css')}}" rel="stylesheet" />
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>Modification de la recette {{$recipe->title}}</b></h4>

                <div class="row" style="margin-top: 15px;">
                    <form role="form" action="{{route('dash.updateRecipe',['id' => $recipe->id])}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="image1">Image Principale</label>
                            <img src="{{image_url('uploads/recipe_images/'.$recipe->image,100,100)}}" alt="">
                            <input class="filestyle" data-input="false" id="image1" type="file" name="image">
                        </div>

                        <div class="form-group">
                            <label for="title">Titre de la recette</label>
                            <input type="text" value="{{$recipe->title}}" name="title" required id="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="5">{{$recipe->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="author">Auteur</label>
                            <input type="text" value="{{$recipe->author_name}}" name="author_name" required id="author" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="category">Catégorie de la recette</label>
                            <select name="category" id="category" class="form-control">
                                <option @if($recipe->category == "vegetarien") selected @endif value="vegetarien">végétarien</option>
                                <option @if($recipe->category == "glutenFree") selected @endif value="glutenFree">Sans gluten</option>
                                <option @if($recipe->category == "PlantB") selected @endif value="PlantB">Plant-B</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tprepare">Durée de preparation</label>
                            <input type="number" value="{{$recipe->preparation_time}}" class="form-control" name="preparation_time" id="tprepare">
                        </div>
                        <div class="form-group">
                            <label for="nbrperson">Nombre de personnes</label>
                            <input type="number" value="{{$recipe->number_person}}" class="form-control" name="number_person" id="nbrperson">
                        </div>

                        <div class="form-group">
                            <label for="body1">Contenu de la recette</label>
                            <textarea class="form-control summernote" name="body" id="body1" cols="30" rows="5">{!! $recipe->body !!}</textarea>
                        </div>
                        @if($recipe->steps()->count())
                            <div class="row">
                                <div class="col-sm-12">
                                    <h3>Etapes de la recettes</h3>
                                    <div id="js-etapes-container" >
                                        @foreach($recipe->steps as $step)
                                            <div class="js-etape-{{$loop->iteration}}">
                                                <div class="form-group">
                                                    <label for="etape1">Etape {{$loop->iteration}}</label>
                                                    @if(!$loop->first)
                                                        <div class="pull-right">
                                                            <button type="button" style="display: inline;margin-bottom: 2px;" class="btn btn-danger js-delete-etape"><i class="fa fa-trash"></i>Supprimer</button>
                                                        </div>
                                                    @endif
                                                    <textarea class="form-control" name="etapes[]" id="etape{{$loop->iteration}}" cols="30" rows="5">{{$step->body}}</textarea>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="pull-right">
                                        <button type="button" class="btn btn-primary waves-effect waves-light" id="js-btn-add-etape" style="margin-top:10px;">Ajouter Etape</button>
                                    </div>
                                </div>
                            </div>
                        @else
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
                        @endif
                        <div class="form-group">
                            <label for="tip">Astuces</label>
                            <textarea class="form-control" name="tip" id="tip" cols="30" rows="5">{{$recipe->tip}}</textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-block" type="submit">Modifier Recette</button>
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
    <script>
        $('.summernote').summernote({
            height: 350,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: false                 // set focus to editable area after initializing summernote
        });
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
