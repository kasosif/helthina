@extends('layouts.appDash')
@section('title') Comment @endsection
@section('csspage') @endsection
@section('content')

<table class="table">
    <thead>
        <tr>
            <th scope="col">Commentaire</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($comments as $comment)
        <tr>
            <td>{{$comment->message}} </td>
            <td> <a class="btn btn-primary signin" role="button" href="{{route('front.single_article',['id' => $comment->article_id])}}"> Consulter </a></td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
@section('jspage') @endsection