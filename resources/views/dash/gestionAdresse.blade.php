@extends('layouts.appDash')
@section('title') Gestion adresse @endsection
@section('csspage') @endsection
@section('content')

<h3>Gestion adresse</h3>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Emplacement</th>
            <th scope="col">Image</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($adresses as $adress)
        <tr>
            <td>{{$adress->name}} </td>
            <td>{{$adress->localisation}}</td>
            <td><img class="img-fluid" data-bss-hover-animate="pulse" src="{{asset('uploads/adresse_images/'.$adress->image)}}" alt="alt text here" style="border: 1px solid rgb(135,135,135) ; height: 100px;"></td>
            <td>
                <form method="POST" action="{{route('dash.deleteAdresse',['adresse_id' => $adress->id])}}">
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

<form method="post" id="add-article" action="{{route('dash.ajouterAdresse')}}" enctype="multipart/form-data">
    @csrf
    <div id="booking_fieldset">
        <div class="block">
            <div class="block-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="title">Nom<span class="text-danger">*</span>
                            </label>
                            <input type="text" required name="name" class="form-control" id="title" title="Nom" placeholder="Nom">
                        </div>
                    </div>
                </div>
                <div class="row-separator"></div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="title">Emplacement<span class="text-danger">*</span>
                            </label>
                            <input type="text" required name="localisation" class="form-control" id="title" title="Emplacement" placeholder="Emplacement">
                        </div>
                    </div>
                </div>
                <div class="row-separator"></div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="title">Lien google maps<span class="text-danger">*</span>
                            </label>
                            <input type="text" required name="map_link" class="form-control" id="title" title="Lien google maps" placeholder="Lien google maps">
                        </div>
                    </div>
                </div>
                <div class="row-separator"></div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="title">Lien page facebook<span class="text-danger">*</span>
                            </label>
                            <input type="text" required name="fb_link" class="form-control" id="title" title="Lien page facebook" placeholder="Lien page facebook">
                        </div>
                    </div>
                </div>
                <div class="row-separator"></div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="title">Lien page instagram<span class="text-danger">*</span>
                            </label>
                            <input type="text" required name="instagram_link" class="form-control" id="title" title="Lien page instagram" placeholder="Lien page instagram">
                        </div>
                    </div>
                </div>
                <input type="file" name="image" onchange="loadFile(event)" id="article_gallery">
                <div class="row-separator"></div>
                <div class="row " id="article_img_prev" style="display: none; margin-top: 14px;"></div>
                <div class="row-separator"></div>
                <div class="row">
                    <div class="block-right">
                        <button type="submit" class="btn btn-success btn-lg">Ajouter Adresse</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form><!-- #add-property-form -->

@endsection
@section('jspage') @endsection