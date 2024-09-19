<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="/assets/images/logo.png" alt="logo" height="50px" width="50px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item @yield('active1')"><a href="/#berita" class="nav-link">Berita</a></li>
                <li class="nav-item @yield('active2')"><a href="/donation/category/" class="nav-link">Kategori</a></li>
                <li class="nav-item @yield('active3')"><a href="/#info-kami" class="nav-link">Info Kami</a></li>
                <li class="nav-item @yield('active4')"><a href="/#kontak_kami" class="nav-link">Kontak Kami</a></li>
                @if (auth()->user() && (auth()->user()->level == 'donor'))
                    <li class="nav-item"><a href="/logout" class="nav-link">Logout</a></li>
                @else
                    <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
