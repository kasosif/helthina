@extends('layouts.app')
@section('title') Se Connecter @endsection

@section('content')
<section class="login-clean">
    <form data-aos="zoom-in" data-aos-duration="500" method="POST" action="{{ route('login') }}">
        @csrf
        <h2 class="sr-only">Login Form</h2>
        <div class="illustration">
            <h1 class="login-title">Connexion</h1>
            <h1><img src="{{asset('assets/img/exit-2.svg')}}"></h1>
        </div>
        <div class="form-group">
            <input class="form-control @error('email') is-invalid @enderror " required type="email" name="email" placeholder="Email" value="{{ old('email') }}">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <input class="form-control @error('password') is-invalid @enderror " required type="password" name="password" placeholder="Mot de passe">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group"><button class="btn btn-success btn-block log-btn" type="submit">Connexion</button></div>
        <a class="forgot" href="{{route('register')}}" style="font-family: 'Poppins';">Vous n'avez pas de compte? <span style="color: var(--green);">Inscrivez-vous</span></a>
    </form>
</section>
@endsection

