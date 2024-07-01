<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('page.css') }}">
    <title>Randevu Düzenle</title>
</head>
<body>
<nav class="navbar">
    <div class="container-fluid navbar-expand-lg">
        <a href="{{ url('') }}"><img src="{{ asset('resimler/toothLogo-removebg-preview.png') }}" width="70px" alt="LOGO"></a>
        <a class="navbar-brand" href="#">I-DENTIST</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link border-custom" href="{{ url('/') }}">Ana Sayfa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link border-custom" href="{{route('profile')}}">Hesabım</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@php
    use Carbon\Carbon;
    $formattedDate = isset($appointment->date) ? Carbon::parse($appointment->date)->format('Y-m-d') : '';
@endphp

<div class="container mt-5">
    <h2>Randevu Düzenle</h2>
    <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="time" class="form-label">Saat:</label>
            <input type="time" class="form-control" id="time" name="time" required value="{{ $appointment->time }}">
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Tarih:</label>
            <input type="date" class="form-control" id="date" name="date" required value="{{ $formattedDate }}">
        </div>
        <button type="submit" class="btn btn-success">Gönder</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
