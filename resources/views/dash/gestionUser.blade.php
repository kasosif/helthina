@extends('layouts.appDash')
@section('title') Gestion Utilisateur @endsection
@section('csspage')
    <link href="{{asset('backassets/plugins/summernote/summernote.css')}}" rel="stylesheet" />
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>Liste des utilisateurs</b></h4>

                @if($users->count())
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nom Complet</th>
                            <th>Email</th>
                            <th>Date d'inscription'</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $u)
                            <tr>
                                <td>{{$u->name}}</td>
                                <td>{{$u->email}} </td>
                                <td>{{date('d-m-Y',strtotime($u->created_at))}}</td>
                                <td >
                                    <a class="btn btn-info" role="button" href="{{route('dash.editUser',['id' => $u->id])}}"> <i class="fa fa-pencil"></i> </a>
                                    <form style="display: inline" method="POST" action="{{route('dash.deleteUser',['id' => $u->id])}}">
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
                        Aucun Utilisateur trouvé
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>Ajouter un utilisateur</b></h4>

                <div class="row" style="margin-top: 15px;">
                    <form role="form" action="{{route('dash.ajouterUser')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nom Complet</label>
                            <input type="text" name="name" required id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" required id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-block" type="submit">Ajouter Membre</button>
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
