@extends('layouts.appDash')
@section('title') Gestion article @endsection
@section('csspage')
    <link href="{{asset('backassets/plugins/summernote/summernote.css')}}" rel="stylesheet" />
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>Liste des articles</b></h4>

                @if($articles->count())
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Titre</th>
                            <th>Date de publication</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($articles as $liked)
                            <tr>
                                <td>
                                    <img class="img-fluid" data-bss-hover-animate="pulse" src="{{image_url('uploads/article_images/'.$liked->image,100,100)}}" alt="alt text here" style="border: 1px solid rgb(135,135,135) ; height: 100px;">
                                </td>
                                <td>{{$liked->title}} </td>
                                <td>{{date('d-m-Y',strtotime($liked->created_at))}}</td>
                                <td >
                                    <a class="btn btn-primary" role="button" href="{{route('front.single_article',['id' => $liked->id])}}"> <i class="fa fa-eye"></i> </a>
                                    <a class="btn btn-info" role="button" href="{{route('dash.modifArticle',['id' => $liked->id])}}"> <i class="fa fa-pencil"></i> </a>
                                    <form style="display: inline" method="POST" action="{{route('dash.deleteArticle',['article_id' => $liked->id])}}">
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
                        Aucun Article trouvé
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>Ajouter un article</b></h4>

                <div class="row" style="margin-top: 15px;">
                    <form role="form" action="{{route('dash.ajouterArticle')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image1">Image Principale</label>
                                    <input class="filestyle" data-input="false" id="image1" type="file" name="image">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image2">Deuxieme Image</label>
                                    <input class="filestyle" data-input="false" id="image2" type="file" name="second_image">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title">Titre de l'article</label>
                            <input type="text" name="title" required id="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="title2">deuxieme titre de l'article</label>
                            <input type="text" name="second_title" required id="title2" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="body1">Contenu de l'article</label>
                            <textarea class="form-control summernote" name="first_body" id="body1" cols="30" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="body2">Deuxuieme Contenu de l'article</label>
                            <textarea class="form-control summernote" name="second_body" id="body2" cols="30" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-block" type="submit">Ajouter Article</button>
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
