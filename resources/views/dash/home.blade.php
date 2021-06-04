@extends('layouts.appDash')
@section('title') Article favoris @endsection
@section('csspage') @endsection
@section('content')
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="widget-bg-color-icon card-box fadeInDown animated">
                <div class="bg-icon bg-icon-info pull-left">
                    <i class="ti-write text-info"></i>
                </div>
                <div class="text-right">
                    <h3 class="text-dark"><b class="counter">{{$nb_articles}}</b></h3>
                    <p class="text-muted">Total Articles</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="widget-bg-color-icon card-box">
                <div class="bg-icon bg-icon-pink pull-left">
                    <i class="fa fa-cutlery text-pink"></i>
                </div>
                <div class="text-right">
                    <h3 class="text-dark"><b class="counter">{{$nb_recettes}}</b></h3>
                    <p class="text-muted">Total recettes</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="widget-bg-color-icon card-box">
                <div class="bg-icon bg-icon-purple pull-left">
                    <i class="ti-map text-purple"></i>
                </div>
                <div class="text-right">
                    <h3 class="text-dark"><b class="counter">{{$nb_addresses}}</b></h3>
                    <p class="text-muted">Total adresses</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="widget-bg-color-icon card-box">
                <div class="bg-icon bg-icon-success pull-left">
                    <i class="ti-world text-success"></i>
                </div>
                <div class="text-right">
                    <h3 class="text-dark"><b class="counter">{{$nb_wadresses}}</b></h3>
                    <p class="text-muted">Total Web Adresses</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

@endsection
@section('jspage') @endsection
