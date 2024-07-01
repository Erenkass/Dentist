<!-- resources/views/patient/create.blade.php -->

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Hasta Ekle</title>
</head>
<body>
<nav class="navbar">
    <div class="container-fluid navbar-expand-lg">
        <a href="{{ url('/') }}"><img src="{{ asset('resimler/toothLogo-removebg-preview.png') }}" width="70px" alt="LOGO"></a>
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
                    <a class="nav-link border-custom" href="#">Hesabım</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h2>Hasta Ekle</h2>
    <form action="{{ route('patients.store') }}" method="POST">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">İsim:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="surname" class="form-label">Soyisim:</label>
            <input type="text" class="form-control" id="surname" name="surname" required>
        </div>
        <div class="mb-3">
            <label for="tc" class="form-label">Kimlik Numarası:</label>
            <input type="text" class="form-control" id="tc" name="tc" required minlength="11" maxlength="11">
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Telefon Numarası:</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" required minlength="11" maxlength="11">
        </div>
        <div class="mb-3">
            <label for="birthday" class="form-label">Doğum Tarihi:</label>
            <input type="date" class="form-control" id="birthday" name="birthday" required>
        </div>
        <button type="submit" class="btn btn-success">Gönder</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
