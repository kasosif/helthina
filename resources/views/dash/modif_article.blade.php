@extends('layouts.appDash')
@section('title') Modification de l'article {{$article->title}}@endsection
@section('csspage')
    <link href="{{asset('backassets/plugins/summernote/summernote.css')}}" rel="stylesheet" />
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>Modification de l'article {{$article->title}}</b></h4>

                <div class="row" style="margin-top: 15px;">
                    <form role="form" action="{{route('dash.updateArticle',['id' => $article->id])}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image1">Image Principale</label>
                                    <img src="{{image_url('uploads/article_images/'.$article->image,100,100)}}" alt="">
                                    <input class="filestyle" data-input="false" id="image1" type="file" name="image">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image2">Deuxieme Image</label>
                                    <img src="{{image_url('uploads/article_images/'.$article->second_image,100,100)}}" alt="">
                                    <input class="filestyle" data-input="false" id="image2" type="file" name="second_image">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title">Titre de l'article</label>
                            <input type="text" value="{{$article->title}}" name="title" required id="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="title2">deuxieme titre de l'article</label>
                            <input type="text" value="{{$article->second_title}}" name="second_title" required id="title2" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="body1">Contenu de l'article</label>
                            <textarea class="form-control summernote" name="first_body" id="body1" cols="30" rows="5">{!! $article->first_body !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="body2">Deuxuieme Contenu de l'article</label>
                            <textarea class="form-control summernote" name="second_body" id="body2" cols="30" rows="5">{!! $article->second_body !!}</textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-block" type="submit">Modifier Article</button>
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

    </script>
@endsection
