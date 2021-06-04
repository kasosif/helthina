@extends('layouts.appDash')
@section('title') Articles aimés @endsection
@section('csspage') @endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>Liste des articles aimé</b></h4>

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
                                    <img class="img-fluid" data-bss-hover-animate="pulse" src="{{asset('uploads/article_images/'.$liked->image)}}" alt="alt text here" style="border: 1px solid rgb(135,135,135) ; height: 100px;">
                                </td>
                                <td>{{$liked->title}} </td>
                                <td>{{date('d-m-Y',strtotime($liked->created_at))}}</td>
                                <td >
                                    <a class="btn btn-primary" role="button" href="{{route('front.single_article',['id' => $liked->id])}}"> <i class="fa fa-eye"></i> </a>
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


@endsection
@section('jspage') @endsection
