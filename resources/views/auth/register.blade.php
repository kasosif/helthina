@extends('layouts.app')

@section('title') S'inscrire @endsection
@section('content')
    <section class="register-photo">
        <div class="text-center form-container" data-aos="zoom-in" style="max-width: 622px;border-radius: 25px;">
            <form style="border-radius: 25px;" method="POST" action="{{ route('register') }}">
                @csrf
                <h2 class="text-center reg-title" style="color: var(--gray-dark);">Créer un compte<br></h2>
                <div class="form-group">
                    <input class="form-control @error('name') is-invalid @enderror " type="text" name="name" placeholder="Nom d'utilisateur">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control @error('email') is-invalid @enderror " type="email" name="email" placeholder="Email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control @error('password') is-invalid @enderror " type="password" name="password" placeholder="Mot de passe">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password_confirmation" placeholder="Confirmer Mot de passe">
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input required class="form-check-input" type="checkbox">J'accepte les termes de la licence.<br>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-success btn-block log-btn" type="submit">S'inscrire</button>
                </div>
                <a class="already" href="{{route('login')}}">Avez vous déjà un compte ? Connectez-vous ici.<br></a>
            </form>
        </div>
    </section>
@endsection


