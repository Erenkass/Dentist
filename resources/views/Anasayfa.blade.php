<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('page.css') }}">
    <link rel="stylesheet" href="{{ asset('anasayfa.css') }}">
    <title>Diş Klinik Kayıt Sistemi</title>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{asset('resimler/toothLogo-removebg-preview.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
            I-Dentist
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link btn btn-signup" href="{{route('register')}}">Kaydol</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-login" href="{{'login'}}">Giriş Yap</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div style="background-image:url('{{ asset('resimler/dalle.webp') }}'); background-size:cover; background-position: center; background-repeat:no-repeat ">
    <div class="hero-section">

        <h1>I-Dentist</h1>
        <h2>Diş Hekimlerine Özel Klinik Kayıt Sistemi</h2>
        <p class="lead">Klinik yönetimi için kolay, hızlı ve güvenilir bir çözüm.</p>
    </div>

    <div class="row px-md-5">
        <div class="col-md-4">
            <div class="feature-box">
                <div class="feature-icon">
                    <i class="bi bi-people"></i>
                </div>
                <div class="feature-title">Hasta Yönetimi</div>
                <div class="feature-description">
                    Hasta bilgilerini güvenli bir şekilde yönetin, randevuları takip edin ve hasta geçmişlerini görüntüleyin.
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-box">
                <div class="feature-icon">
                    <i class="bi bi-calendar"></i>
                </div>
                <div class="feature-title">Randevu Takibi</div>
                <div class="feature-description">
                    Kolayca randevu oluşturun, güncelleyin ve iptal edin. Hasta ve doktor randevu takvimlerini senkronize edin.
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-box">
                <div class="feature-icon">
                    <i class="bi bi-file-earmark-text"></i>
                </div>
                <div class="feature-title">Raporlama</div>
                <div class="feature-description">
                    Klinik performansınızı detaylı istatistikler ve raporlarla izleyerek, verimliliğinizi artırın ve maliyetleri takip ederek finansal kararlar alın.
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Call to Action Section -->
<div class="cta-section">
    <div class="container">
        <h2>Neden Biz?</h2>
        <p class="lead">Diş hekimleri için özel olarak tasarlanmış klinik kayıt sistemi ile klinik yönetimini
            kolaylaştırın.</p>
        <a class="btn btn-lg btn-outline-light mt-3" href="#">Daha Fazla Bilgi</a>
    </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-light text-center py-4">
    &copy; 2024 I-Dentist. Tüm hakları saklıdır.
</footer>

<!-- JavaScript ve Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
