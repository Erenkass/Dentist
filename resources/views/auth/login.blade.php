@extends('layouts.app')

@section('content')
    <div class="login-background">
        <div class="login-form">
            <h2 align="center">Hoş Geldiniz</h2>
            <h3 align="center">Lütfen hesabınızda oturum açın</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Şifre">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                Beni Hatırla
                            </label>
                        </div>


                        <button type="submit" >
                            {{ __('Login') }}
                        </button>

                <nav class="d-flex justify-content-between mt-3">
                    <a href="{{ route('password.request') }}" class="custom-link">şifremi unuttum!</a>
                    <a href="{{ route('register') }}" class="custom-link">Kaydol</a>
                </nav>
            </form>

        </div>
    </div>
@endsection
