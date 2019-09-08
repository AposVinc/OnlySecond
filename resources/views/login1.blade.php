@extends('frontend.layout')

@section('content')
    <div class="accesso">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-10 center">
                    <div class="card mt_20 ">
                        <h3 class="card-header text-center text-uppercase">{{ __('Login') }}</h3>

                        <div class="card-body mt_20">
                                <form method="POST" action="{{ route('user.loginpost') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('Indirizzo E-mail') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Ricordami') }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 offset-md-4">
                                            @if (Route::has('password.request'))
                                                <h6><i><u><a href="{{ route('password.request') }}">{{ __('Password Dimenticata?') }}</a></u></i></h6>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6 center">
                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>

                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-sm-6 right">
                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-secondary">
                                                <a href="{{ route('Registrazione') }}"> {{ __('Registrati') }} </a>
                                            </button>

                                        </div>
                                    </div>
                                    </div>
                                </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection