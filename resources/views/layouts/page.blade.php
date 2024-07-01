<body>
<nav class="navbar ">
    <div class="container-fluid navbar-expand-lg">
        <a href=""><img src="{{asset('resimler/toothLogo-removebg-preview.png')}}" width="70px" alt="LOGO"></a>
        <a class="navbar-brand" href="#">I-DENTIST</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link  border-custom " href="{{route('patients.index')}}">Ana Sayfa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  border-custom " href="{{route('profile')}}">Hesabım</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="row">
    <div class="col-md-3 col-lg-2 d-md-block sidebar border-menu">
        <div class="position-sticky sidebar-sticky ">
            <h4 class="px-3 pt-3" align=center>Menü</h4>
            <br>
            <ul class="nav flex-column px-3 ">
                <li class="nav-item mb-2" align="center">
                    <a class="nav-link menu-link " href="{{route('patients.index')}}">Hasta Listesi</a>
                </li>
                <li class="nav-item mb-2" align="center">
                    <a class="nav-link menu-link" href="{{route('appointments.index')}}">Randevular</a>
                </li>
                <li class="nav-item mb-2" align="center">
                    <a class="nav-link menu-link" href="{{route('past')}}">Geçmiş</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-9 col-lg-10 content-area">
        @yield('content')
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
