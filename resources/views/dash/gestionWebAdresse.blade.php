@extends('layouts.appDash')
@section('title') Gestion adresse @endsection
@section('csspage')
<link href="{{asset('backassets/plugins/summernote/summernote.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title"><b>Liste des adresses web</b></h4>

            @if($webAdresses->count())
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Liens</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($webAdresses as $adress)
                    <tr>
                        <td>
                            <img class="img-fluid" data-bss-hover-animate="pulse" src="{{image_url('uploads/web_adresse_images/'.$adress->image)}}" alt="alt text here" style="border: 1px solid rgb(135,135,135) ; height: 100px;">
                        </td>
                        <td><a href="{{$adress->map_link}}"><i class="ti-world" style="font-size: 28px;"></i></a></td>
                        <td class="row">
                            <form style="display: inline;" method="POST" action="{{route('dash.deleteWebAdresse',['web_address_id' => $adress->id])}}">
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
                Aucune Adresse web trouvé
            </div>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title"><b>Ajouter une adresse web</b></h4>

            <div class="row" style="margin-top: 15px;">
                <form role="form" action="{{route('dash.ajouterWebAdresse')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image1">Image</label>
                                <input class="filestyle" data-input="false" id="image1" type="file" name="image">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lien">Lien</label>
                        <input type="text" name="map_link" required id="lien" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success btn-block" type="submit">Ajouter Adresse web</button>
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
