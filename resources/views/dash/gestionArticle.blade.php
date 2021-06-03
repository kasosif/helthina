@extends('layouts.appDash')
@section('title') Gestion article @endsection
@section('csspage') @endsection
@section('content')

<table class="table">
    <thead>
        <tr>
            <th scope="col">Titre</th>
            <th scope="col">Date de publication</th>
            <th scope="col">Image</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($articles as $liked)
        <tr>
            <td>{{$liked->title}} </td>
            <td>{{date('d-m-Y',strtotime($liked->created_at))}}</td>
            <td><img class="img-fluid" data-bss-hover-animate="pulse" src="{{asset('uploads/article_images/'.$liked->image)}}" alt="alt text here" style="border: 1px solid rgb(135,135,135) ; height: 100px;"></td>
            <td> <a class="btn btn-primary signin" role="button" href="{{route('front.single_article',['id' => $liked->id])}}"> Consulter </a></td>
            <td>
                <form method="POST" action="{{route('dash.deleteArticle',['article_id' => $liked->id])}}">
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

<form method="post" id="add-article" action="{{route('dash.ajouterArticle')}}" enctype="multipart/form-data">
    @csrf
    <div id="booking_fieldset">
        <div class="block">
            <div class="block-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="title">Titre de l'article <span class="text-danger">*</span>
                            </label>
                            <input type="text" required name="title" class="form-control" id="title" title="Titre de l'article " placeholder="Titre de l'article ">
                        </div>
                    </div>
                </div>
                <div class="row-separator"></div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="title">Titre de l'article 2<span class="text-danger">*</span>
                            </label>
                            <input type="text" required name="second_title" class="form-control" id="title" title="Titre de l'article " placeholder="Titre de l'article ">
                        </div>
                    </div>
                </div>
                <div class="row-separator"></div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="title">contenu de l'article <span class="text-danger">*</span>
                            </label>
                            <input type="text" required name="first_body" class="form-control" id="title" title="Titre de l'article " placeholder="Titre de l'article ">
                        </div>
                    </div>
                </div>
                <div class="row-separator"></div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="title">continu de l'article 2<span class="text-danger">*</span>
                            </label>
                            <input type="text" required name="second_body" class="form-control" id="title" title="Titre de l'article " placeholder="Titre de l'article ">
                        </div>
                    </div>
                </div>
                <input type="file" name="image" onchange="loadFile(event)" id="article_gallery">
                <input type="file" name="second_image" onchange="loadFile(event)" id="article_gallery">
                <div class="row-separator"></div>
                <div class="row " id="article_img_prev" style="display: none; margin-top: 14px;"></div>
                <div class="row-separator"></div>
                <div class="row">
                    <div class="block-right">
                        <button type="submit" class="btn btn-success btn-lg">Ajouter Article</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form><!-- #add-property-form -->

@endsection
@section('jspage') @endsection