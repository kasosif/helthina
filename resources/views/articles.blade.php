@extends('layouts.app')
@section('title') Articles @endsection
@section('csspage') @endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 data-aos="zoom-in" class="article-header" style="font-size: 36px;">Trouvez les meilleures nouvelles et conseils sur la nourriture saine&nbsp;<img class="file" src="assets/img/file-1.svg"><br></h1>
        </div>
    </div>
    <div class="row article-bar" data-aos="fade-up" data-aos-delay="250">
        @foreach($articles as $article)
        <div class="col-md-3 artcl-box">
            <img class="img-fluid box" src="{{image_url('uploads/article_images/'.$article->image,239,239)}}">
            <a href="{{route('front.single_article',['id' => $article->id])}}">
                <p class="artcle-sous">{{$article->title}}</p>
            </a>
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col">
            <nav class="d-xl-flex justify-content-xl-center" id="pagination" style="text-align: center;font-family: 'Poppins Sans', serif;font-size: 16px;">
                {{$articles->links()}}
            </nav>
        </div>
    </div>
</div>
@endsection
@section('jspage') @endsection