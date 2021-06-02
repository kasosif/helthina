@extends('layouts.app')
@section('title') Articles @endsection
@section('csspage') @endsection
@section('articles_active') active @endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 data-aos="zoom-in" class="article-header" style="font-size: 36px;">Trouvez les meilleures nouvelles et conseils sur la nourriture saine&nbsp;<img class="file" src="assets/img/file-1.svg"><br></h1>
        </div>
    </div>
    <div class="row article-bar" data-aos="fade-up" data-aos-delay="250">
        <div class="col-md-3 artcl-box"><img class="img-fluid box" src="assets/img/Rectangle%20382.png"><a href="Article1-1.html">
                <p class="artcle-sous">Maladie cœliaque : régime alimentaire sans gluten</p>
            </a></div>
        <div class="col-md-3 artcl-box"><img class="img-fluid box" src="assets/img/Designer-Creates-Surreal-Images-By-Photoshopping-Two-Completely-Different-Objects-Into-One-_1_.png"><a href="Article1-1-1.html">
                <p class="artcle-sous">Envie de manger sain ? Voici les 4 règles à respecter</p>
            </a></div>
        <div class="col-md-3 artcl-box"><img class="img-fluid box" src="assets/img/Rectangle%20383.png"><a href="Article1.html">
                <p class="artcle-sous">Qu'est-ce que "manger sain"? Même la science a du mal à le définir<br></p>
            </a></div>
        <div class="col-md-3 artcl-box"><img class="img-fluid box" src="assets/img/Rectangle%20381.png"><a href="Article1-1-1-1.html">
                <p class="artcle-sous">Qu’est-ce qu’un mode de vie sain?</p>
            </a></div>
        <div class="col">
            <nav class="d-xl-flex justify-content-xl-center" id="pagination" style="text-align: center;font-family: 'Poppins Sans', serif;font-size: 16px;">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection
@section('jspage') @endsection
