<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Hesabim</title>
    <link rel="stylesheet" href="{{ asset('page.css') }}">
    <link rel="stylesheet" href="{{ asset('profile.css') }}">
</head>
<body>
<nav class="navbar ">
    <div class="container-fluid navbar-expand-lg">
        <a href=""><img src="{{ asset('resimler/toothLogo-removebg-preview.png') }}" width="70px" alt="LOGO"></a>
        <a class="navbar-brand" href="#">I-DENTIST</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link border-custom" href="{{ route('patients.index') }}">Ana Sayfa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link border-custom" href="{{ route('profile') }}">Hesabım</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link border-custom" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Çıkış Yap</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="row">
    <div class="col-md-3 col-lg-2 d-md-block sidebar border-menu">
        <div class="position-sticky sidebar-sticky">
            <h4 class="px-3 pt-3" align="center">Menü</h4>
            <br>
            <ul class="nav flex-column px-3">
                <li class="nav-item mb-2" align="center">
                    <a class="nav-link menu-link" href="{{ route('patients.index') }}">Hasta Listesi</a>
                </li>
                <li class="nav-item mb-2" align="center">
                    <a class="nav-link menu-link" href="{{ route('appointments.index') }}">Randevular</a>
                </li>
                <li class="nav-item mb-2" align="center">
                    <a class="nav-link menu-link" href="">Geçmiş</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-9 col-lg-10 content-area">
        <div class="container mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <img src="{{ !empty($user->profile_image) ? url('upload/admin_images/' . $user->profile_image) : url('upload/no_image.jpg') }}" alt="Profil Fotoğrafı" class="img-fluid rounded-circle" width="75%">
                        </div>
                        <div class="col-md-8">
                            <h3>Dr.{{ $user->name }} &nbsp {{ $user->surname }} </h3>
                            <p class="text-muted">Diş Hekimi</p>
                            <p><strong>E-posta:</strong> {{ $user->email }}</p>
                            <p><strong>Telefon:</strong> {{ $user->phone_number }}</p>
                            <p><strong>Hakkımda:</strong> {{ $user->about_me }}</p>
                            <a href="{{ route('edit_profile', $user->id) }}" class="btn btn-primary mt-3">Profili Düzenle</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
