@extends('layouts.app')
@section('title') Qui sommes nous ? @endsection
@section('csspage') @endsection
@section('content')
    <section>
        <div class="container" data-aos="zoom-in" style="margin-top: 75px;margin-bottom: 100px;">
            <div class="row">
                <div class="col-md-6">
                    <h1 style="margin-top: 39px;font-size: 38px;">Qui sommes-nous?</h1>
                    <p>Nous sommes deux jeunes étudiants : Aladin Chokri &amp; Jyhen Bellahouel<br>
                        <strong>Notre ambition :</strong><br>
                        Vous aider à changer durablement votre mode de vie en adoptant une alimentation saine
                        sans frustration !<br>
                        <strong>Le concept :</strong><br>
                        Créer une communauté et offrir aux gens qui trouvent une difficulté à trouver des recettes,<br>
                        des restaurants healthy, des boutiques où ils peuvent acheter des produits bio. .<br>
                    </p>
                    <p>
                        <a href="https://www.instagram.com/_healthina/">
                            <i class="fa fa-instagram" style="font-size: 40px;"></i>
                        </a>&nbsp;
                    </p>
                </div>
                <div class="col-md-6" style="text-align: center;">
                    <img class="img-fluid" src="{{asset('assets/img/about.png')}}">
                </div>
            </div>
        </div>
    </section>
@endsection
