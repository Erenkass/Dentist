@extends('layouts.app')

@section('content')
    <div class="login-background">
        <div class="register-form">
            <h2 align="center">Kayıt Ol</h2>
            <h3 align="center">Lütfen bilgilerinizi girin</h3>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Ad Soyad">
                @error('name')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror

                <select id="job_id" name="job_id" class="form-control @error('job_id') is-invalid @enderror" required>
                    <option value="" disabled selected>Görev</option>
                    <option value="Doktor" {{ old('job_id') == 'Doktor' ? 'selected' : '' }}>Doktor</option>
                    <option value="Sekreter" {{ old('job_id') == 'Sekreter' ? 'selected' : '' }}>Sekreter</option>
                </select>
                @error('job_id')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror

                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" placeholder="Telefon">
                @error('phone_number')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror

                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Parola">
                @error('password')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Parolayı Onaylayın">

                <button type="submit">
                    Kaydol
                </button>
            </form>
        </div>
    </div>
@endsection
