@extends('layouts.appDash')
@section('title') Article favoris @endsection
@section('csspage') @endsection
@section('content')

<table class="table">
    <thead>
        <tr>
            <th scope="col">Titre</th>
            <th scope="col">Date de publication</th>
            <th scope="col">Image</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($likedArticles as $liked)
        <tr>
            <td>{{$liked->title}} </td>
            <td>{{date('d-m-Y',strtotime($liked->created_at))}}</td>
            <td><img class="img-fluid" data-bss-hover-animate="pulse" src="{{asset('uploads/web_adresse_images/'.$liked->image)}}" alt="alt text here" style="border: 1px solid rgb(135,135,135) ; height: 100px;"></td>
            <td> <a class="btn btn-primary signin" role="button" href="{{route('front.single_article',['id' => $liked->id])}}"> Consulter </a></td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
@section('jspage') @endsection