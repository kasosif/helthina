@extends('layouts.appDash')
@section('title') Modification de l'utilisateur {{$user->name}}@endsection
@section('csspage')
    <link href="{{asset('backassets/plugins/summernote/summernote.css')}}" rel="stylesheet" />
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>Modification de l'utilisateur {{$user->name}}</b></h4>

                <div class="row" style="margin-top: 15px;">
                    <form role="form" action="{{route('dash.updateUser',['id'=>$user->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nom Complet</label>
                            <input type="text" value="{{$user->name}}" name="name" required id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" value="{{$user->email}}" name="email" required id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-block" type="submit">Modifier Membre</button>
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
        var gArrayFonts = ['Poppins','Poppins-Bold','Poppins-Black','Poppins-Extrabold','Poppins-Extralight','Poppins-Light','Poppins-Medium','Poppins-Semibold','Poppins-Thin'];
        $('.summernote').summernote({
            height: 350,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: false,
            fontNames: gArrayFonts,
            fontNamesIgnoreCheck: gArrayFonts,
            fontSizes: ['8', '9', '10', '11', '12', '13', '14', '15', '16', '18', '20', '22' , '24', '28', '32', '36', '40', '48'],
            followingToolbar: false,
            dialogsInBody: true,
        });
        @if(session()->has('success'))
        $.Notification.notify('success','top right','Youpi', '{{session()->get('success')}}');
        @endif

    </script>
@endsection
