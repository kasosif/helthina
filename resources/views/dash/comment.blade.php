@extends('layouts.appDash')
@section('title') Mes Commentaires @endsection
@section('csspage') @endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>Mes Commentaires</b></h4>

                @if($comments->count())
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Commentaire</th>
                            <th>Article</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                            <tr>
                                <td>
                                    {{$comment->message}}
                                </td>
                                <td>{{$comment->article->title}} </td>
                                <td >
                                    <a class="btn btn-primary" role="button" href="{{route('front.single_article',['id' => $comment->article->id])}}"> <i class="fa fa-eye"></i> </a>
                                    <a class="btn btn-danger" role="button" href="{{route('dash.deleteComment',['id' => $comment->id])}}"> <i class="fa fa-trash"></i> </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-info">
                        Aucun Commentaire trouvé
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('jspage') @endsection
