@extends('layouts.app')
@section('title') Recettes @endsection
@section('csspage') @endsection
@section('recettes_active') active @endsection
@section('content')
<section style="text-align: center;background: rgba(252,252,252,0);">
    <div class="container" style="text-align: center;">
        <div class="row">
            <div class="col" style="padding: 0px;height: 49px;margin-top: 50px;">
                <h1 class="text-center" style="margin-top: -15px;">Des recettes&nbsp;végétarien simple<br></h1>
            </div>
        </div>
        <div class="row" style="text-align: center;margin-top: 80px;">
            <div class="col-md-3 text-center recettes-box" data-aos="fade-up" data-aos-duration="500" data-aos-delay="250"><img class="img-fluid ima" src="assets/img/Tomato%20Gratin.png">
                <p style="margin-top: 25px;">Par : Gina Homolka<br></p><a href="#"></a><a href="#"><i class="fa fa-bookmark" style="font-size: 28px;"></i></a>
                <p style="color: var(--warning);margin-top: 25px;"><i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i></p>
                <h1 class="recettes-titre">&nbsp; &nbsp; &nbsp; &nbsp;Tomato&nbsp; &nbsp; &nbsp; &nbsp; Gratin<br></h1>
                <p class="recettes-soustitre">végétarien &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 20min<br></p><a class="btn btn-secondary" role="button" data-bss-hover-animate="pulse" style="font-family: 'poppins', serif;border-radius: 25px;width: 120.25px;" href="recette1.html">Voir</a>
            </div>
            <div class="col-md-3 text-center recettes-box2" data-aos="fade-up" data-aos-duration="500" data-aos-delay="500"><img class="img-fluid ima" src="assets/img/saahil-khatkhate-kfDsMDyX1K0-unsplash.png">
                <p style="margin-top: 25px;">Par : Teresa Cutter<br></p><a href="#"><i class="fa fa-bookmark" style="font-size: 28px;"></i></a>
                <p style="color: var(--warning);margin-top: 25px;border-color: var(--orange);"><i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i></p>
                <h1 class="recettes-titre">Pizza<br>Helathy</h1>
                <p class="recettes-soustitre" style="height: 25px;margin-top: 25px;font-size: 16px;font-family: Poppins, sans-serif;">végétarien&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 15min<br></p><a class="btn btn-secondary" role="button" data-bss-hover-animate="pulse" style="font-family: 'poppins', serif;border-radius: 25px;width: 120.25px;" href="recette1-1.html">Voir</a>
            </div>
            <div class="col text-center recettes-box" data-aos="fade-up" data-aos-duration="500" data-aos-delay="750"><img class="img-fluid ima" src="assets/img/Bulgur%20&%20lentil%20salad.png">
                <p style="margin-top: 25px;">Par : Diana Keuilian<br></p><a href="#"><i class="fa fa-bookmark" style="font-size: 28px;"></i></a>
                <p style="color: var(--warning);margin-top: 25px;"><i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i></p>
                <h1 class="recettes-titre">Salade de&nbsp;&nbsp;<br>boulgour&nbsp;<br></h1>
                <p class="recettes-soustitre" style="height: 25px;margin-top: 25px;font-size: 16px;font-family: Poppins, sans-serif;">végétarien&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;20min<br></p><a class="btn btn-secondary" role="button" data-bss-hover-animate="pulse" style="font-family: 'poppins', serif;width: 120.25px;border-radius: 25px;" href="recette1-1-1.html">Voir</a><a href="#"></a>
            </div>
            <div class="col-md-3 text-center recettes-box2" data-aos="fade-up" data-aos-duration="500" data-aos-delay="1000"><img class="img-fluid ima" src="assets/img/tagine%20maroc.png">
                <p style="margin-top: 25px;">Par : Adam Bentalha<br></p><a href="#"><i class="fa fa-bookmark" style="font-size: 28px;"></i></a>
                <p style="color: var(--warning);margin-top: 25px;"><i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i>&nbsp;<i class="fa fa-star"></i></p>
                <h1 class="recettes-titre">Tajine Vegan marocain<br></h1>
                <p class="recettes-soustitre" style="font-family: Poppins, sans-serif;font-size: 16px;color: var(--gray);font-weight: normal;height: 25px;margin-top: 25px;">végétarien&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;20min<br></p><a class="btn btn-secondary" role="button" data-bss-hover-animate="pulse" style="font-family: 'poppins', serif;width: 120.25px;border-radius: 25px;" href="recette1-1-1-1.html">Voir</a>
            </div>
        </div>
    </div>
    <nav class="d-xl-flex justify-content-xl-center" id="pagination" style="text-align: center;font-family: 'poppins', serif;font-size: 16px;">
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
</section>
@endsection
@section('jspage') @endsection