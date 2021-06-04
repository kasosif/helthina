@extends('layouts.app')
@section('title')
    {{$article->title}}
@endsection
@section('csspage')
    <style>
        .asemi-commentaire {
            padding: 15px;
            width: 990px;
            height: 60px;
            margin: 0px;
        }
        .asemi-commentaire:focus{
            outline: none !important;
        }
    </style>
@endsection
@section('articles_active') active @endsection
@section('content')
    <article data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="title">{{$article->title}}<br></h1>
                </div>
            </div>
            <div class="row">
                <div class="col" id="image">
                    <img class="img-fluid img-artc1 box" src="{{asset('uploads/article_images/'.$article->image)}}">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="paragraphe">
                        <br>
                        {!! $article->first_body !!}
                        <br>
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row js-readmore-button-container">
                <div class="col-md-12">
                    <a class="js-readmore-button" href="#" style="font-weight: bold;">Lire la suite &nbsp;&nbsp;</a>
                </div>
            </div>
            <div class="js-more-container" style="display: none;">
                <div class="row">
                    <div class="col-md-12">
                        <h1>{{$article->second_title}}<br></h1>
                    </div>
                </div>
                <div class="row" style="padding: 50px;">
                    <div class="col">
                        <img class="img-fluid box" id="imgarticle2" src="{{asset('uploads/article_images/'.$article->second_image)}}">
                    </div>
                    <div class="col-md-6">
                        <p>
                            {!! $article->second_body !!}
                        </p>
                        <div class="row">
                            <div class="col" style="margin-top: 15px;">
                                @guest
                                    <button class="btn btn-primary" id="like" type="button">
                                        Like {{$article->likes()->count()}} <i class="fa fa-heart"></i>
                                    </button>
                                    <button class="btn btn-light js-toggle-comments" id="comment" type="button" style="margin-left: 15px;">
                                        {{$article->comments()->count()}} Comments&nbsp;<i class="fa fa-comment"></i>
                                    </button>
                                @else
                                    <form style="display: inline" @if(auth()->user()->likes()->where('articles.id',$article->id)->exists()) action="{{route('front.dislike_article')}}" @else action="{{route('front.like_article')}}" @endif method="post">
                                        @csrf
                                        <input type="hidden" name="article_id" value="{{$article->id}}">
                                        <button class="btn btn-primary" id="like" type="submit">
                                            @if(auth()->user()->likes()->where('articles.id',$article->id)->exists())
                                                UnLike {{$article->likes()->count()}} <i class="fa fa-heart"></i>
                                            @else
                                                Like {{$article->likes()->count()}} <i class="fa fa-heart-o"></i>
                                            @endif
                                        </button>
                                    </form>
                                    <button class="btn btn-light js-toggle-comments" id="comment" type="button" style="margin-left: 15px;">
                                        {{$article->comments()->count()}} Comments&nbsp;<i class="fa fa-comment"></i>
                                    </button>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card" id="CommentBox" style="display: none;">
                    @guest
                        <div class="alert alert-warning">
                            Il faut <a href="{{route('login')}}"> vous connectez</a> pour laissez un commentaire
                        </div>
                    @else
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach($article->comments as $comment)
                                    <li class="list-group-item" style="margin-bottom:6px;">
                                        <div class="media">
                                            <div class="media-body">
                                                <div class="media" style="overflow:visible;">
                                                    <div>
                                                        <img class="mr-3" style="width: 25px; height:25px;" src="{{asset('assets/img/user-avatar.png')}}"></div>
                                                    <div class="media-body" style="overflow:visible;">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h5>{{$comment->user->name}}</h5>
                                                                <p> {{$comment->message}}<br>
                                                                    <small class="text-muted">{{date('F d, Y @ h:i',strtotime($comment->created_at))}}</small>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                                <li class="list-group-item" style="margin-bottom:6px;">
                                    <div class="media">
                                        <div></div>
                                        <div class="media-body">
                                            <div class="media" style="overflow:visible;">
                                                <div><img class="mr-3" style="width: 25px; height:25px;" src="{{asset('assets/img/user-avatar.png')}}"></div>
                                                <div class="media-body" style="overflow:visible;">
                                                    <div class="row">
                                                        <form action="{{route('front.comment_article')}}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="article_id" value="{{$article->id}}">
                                                            <div class="col-md-12">
                                                                <p class="rounded-pill">
                                                                    <textarea class="bg-light border rounded-pill border-light form-control-sm asemi-commentaire" placeholder="Ecrire un commentaire" cols="50" name="message"></textarea>
                                                                    <br>
                                                                </p>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="pull-right">
                                                                    <button type="submit" style="border-radius:25px;" class="btn btn-primary">Commentez</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
    <div class="container cont2" data-aos="fade-up" data-aos-duration="500" style="margin-top: 75px;">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-12">
                <h1 style="text-align: left;font-size: 28px;">Article similaire<br></h1>
            </div>
        </div>
        <div class="row">
            @foreach($articles_alike as $a)
                <div class="col">
                    <img class="img-fluid box" data-bss-hover-animate="pulse" src="{{asset('uploads/article_images/'.$a->image)}}">
                    <a href="{{route('front.single_article',['id' => $a->id])}}">
                        <p style="margin-top: 25px;">
                            {{$a->title}}<br>
                        </p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('jspage')
    <script>
        $(document).ready(function () {
            $('.js-toggle-comments').click(function () {
                $('#CommentBox').fadeIn();
                $('html, body').animate({
                    scrollTop: $("#CommentBox").offset().top - 150
                }, 2000);
                return false;
            });
            $('.js-readmore-button').click(function (e) {
                e.preventDefault();
                $('.js-readmore-button-container').remove();
                $('.js-more-container').fadeIn();
            })
        });
    </script>
@endsection
