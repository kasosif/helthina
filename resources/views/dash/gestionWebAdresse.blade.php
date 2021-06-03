@extends('layouts.appDash')
@section('title') Gestion adresse web @endsection
@section('csspage') @endsection
@section('content')

<h3>Gestion adresse web</h3>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Lien</th>
            <th scope="col">Image</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($webAdresses as $adress)
        <tr>
            <td>{{$adress->map_link}} </td>
            <td><img class="img-fluid" data-bss-hover-animate="pulse" src="{{asset('uploads/web_adresse_images/'.$adress->image)}}" alt="alt text here" style="border: 1px solid rgb(135,135,135) ; height: 100px;"></td>
            <td>
                <form method="POST" action="{{route('dash.deleteWebAdresse',['web_address_id' => $adress->id])}}">
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

<form method="post" id="add-article" action="{{route('dash.ajouterWebAdresse')}}" enctype="multipart/form-data">
    @csrf
    <div id="booking_fieldset">
        <div class="block">
            <div class="block-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="title">Lien<span class="text-danger">*</span>
                            </label>
                            <input type="text" required name="map_link" class="form-control" id="title" title="Lien" placeholder="Lien">
                        </div>
                    </div>
                </div>
                <div class="row-separator"></div>
                <input type="file" name="image" onchange="loadFile(event)" id="article_gallery">
                <div class="row-separator"></div>
                <div class="row " id="article_img_prev" style="display: none; margin-top: 14px;"></div>
                <div class="row-separator"></div>
                <div class="row">
                    <div class="block-right">
                        <button type="submit" class="btn btn-success btn-lg">Ajouter Adresse Web</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form><!-- #add-property-form -->

@endsection
@section('jspage') @endsection