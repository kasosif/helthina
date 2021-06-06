@extends('layouts.appDash')
@section('title') Gestion adresse @endsection
@section('csspage')
<link href="{{asset('backassets/plugins/summernote/summernote.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title"><b>Liste des adresses</b></h4>

            @if($adresses->count())
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Nom</th>
                        <th>Emplacement</th>
                        <th>Liens</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($adresses as $adress)
                    <tr>
                        <td>
                            <img class="img-fluid" data-bss-hover-animate="pulse" src="{{image_url('uploads/adresse_images/'.$adress->image,100,100)}}" alt="alt text here" style="border: 1px solid rgb(135,135,135) ; height: 100px;">
                        </td>
                        <td>{{$adress->name}} </td>
                        <td>{{$adress->localisation}}</td>
                        <td>
                            <a href="{{$adress->instagram_link}}"><i class="fa fa-instagram" style="font-size: 28px;"></i></a>
                            <a href="{{$adress->fb_link}}"><i class="fa fa-facebook-official" style="font-size: 28px;"></i></a>
                            <a href="{{$adress->map_link}}"><i class="fa fa-map-marker localisation" style="font-size: 28px;"></i></a>
                        </td>
                        <td class="row">
                            <form style="display: inline;" method="POST" action="{{route('dash.deleteAdresse',['adresse_id' => $adress->id])}}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" role="button">
                                    <i class="fa fa-trash" style="font-size: 16px;"></i> </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="alert alert-info">
                Aucune Adresse trouvé
            </div>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title"><b>Ajouter une adresse</b></h4>

            <div class="row" style="margin-top: 15px;">
                <form role="form" action="{{route('dash.ajouterAdresse')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image1">Image Principale</label>
                                <input class="filestyle" data-input="false" id="image1" type="file" name="image">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" name="name" required id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="localisation">Emplacement</label>
                        <input type="text" name="localisation" required id="localisation" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="map_link">Lien Google maps</label>
                        <input type="text" name="map_link" required id="map_link" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="fb_link">Lien Facebook</label>
                        <input type="text" name="fb_link" required id="fb_link" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="instagram_link">Lien Instagram</label>
                        <input type="text" name="instagram_link" required id="instagram_link" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success btn-block" type="submit">Ajouter Adresse</button>
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
        height: 350, // set editor height
        minHeight: null, // set minimum height of editor
        maxHeight: null, // set maximum height of editor
        focus: false // set focus to editable area after initializing summernote
    });
    @if(session()->has('success'))
    $.Notification.notify('success', 'top right', 'Youpi', '{{session()->get('
        success ')}}');
    @endif
</script>
@endsection
