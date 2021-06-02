@extends('layouts.app')
@section('title') Vos Magasines Bio @endsection
@section('csspage') @endsection
@section('content')

<section style="padding: 50px;">
    <h1 class="text-center" data-aos="zoom-in" data-aos-duration="500" style="font-weight: bold;">Vos magasins Bio<br></h1>
    <p class="text-center" data-aos="fade" data-aos-duration="500" data-aos-delay="250">Faites vos courses bio en ligne sur ces sites e-commerce.<br></p>
    <div class="d-flex flex-row multiple-item-slider">
        @foreach($wadresses as $wadresse)
            <div class="justify-content-center spacer-slider">
                <figure class="figure">
                    <a href="{{$wadresse->map_link}}">
                        <img class="img-fluid" data-bss-hover-animate="pulse" src="{{asset('uploads/web_adresse_images/'.$wadresse->image)}}" alt="alt text here" style="border: 1px solid rgb(135,135,135) ;">
                    </a>
                </figure>
            </div>
        @endforeach
    </div>
</section>

@endsection
@section('jspage') @endsection
