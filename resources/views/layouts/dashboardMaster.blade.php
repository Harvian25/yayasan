<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Firdaus</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="/nice-admin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/nice-admin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/nice-admin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="/nice-admin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="/nice-admin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/nice-admin/assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link href="/nice-admin/assets/css/style.css" rel="stylesheet">

</head>

<body>

    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="/dashboard" class="logo d-flex align-items-center">
                <img src="/assets/images/logo.png" alt="">
                <span class="d-none d-lg-block">Roudhotul Firdaus</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ auth()->user()->photo ? asset('storage/' . auth()->user()->photo) : '/nice-admin/assets/img/profile-img-default.jpg' }}"
                            alt="Profile" class="rounded-circle">
                        @auth
                            <span class="d-none d-md-block dropdown-toggle ps-2">mimin {{ auth()->user()->name }}</span>
                        @endauth
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>Admin {{ auth()->user()->name }}</h6>

                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/profile">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/logout">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Logout</span>
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
        </nav>

    </header>

    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>    
            </li>
        
            <li class="nav-item {{ Request::is('category') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/category') }}">
                    <i class="bi bi-pentagon-fill"></i>
                    <span>Buat Kategori Barang</span>
                </a>
            </li>
        
            <li class="nav-item {{ Request::is('news') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/news') }}">
                    <i class="bi bi-newspaper"></i>
                    <span>Buat Berita</span>
                </a>
            </li>
        
            <li class="nav-item {{ Request::is('items') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/items') }}">
                    <i class="bi bi-diagram-3-fill"></i>
                    <span>Buat Barang Yang Dibutuhkan</span>
                </a>
            </li>
        
            <li class="nav-item {{ Request::is('contacts') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/contacts') }}">
                    <i class="bi bi-person-lines-fill"></i>
                    <span>Kontak</span>
                </a>
            </li>
        
        </ul>
        

    </aside>

    <main id="main" class="main">

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">

                    @yield('dashboard-content')

                </div>
            </div>
        </section>

    </main>

    <script src="/nice-admin/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="/nice-admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/nice-admin/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="/nice-admin/assets/vendor/echarts/echarts.min.js"></script>
    <script src="/nice-admin/assets/vendor/quill/quill.min.js"></script>
    <script src="/nice-admin/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="/nice-admin/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="/nice-admin/assets/vendor/php-email-form/validate.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script src="/nice-admin/assets/js/main.js"></script>
    <script>
        $(document).ready(function() {
            $('#table-donation').DataTable();
            $('#table-items').DataTable();
            $('#table-news').DataTable();
            $('#table-category').DataTable();
            $('#table-contacts').DataTable();
        });
    </script>


</body>

</html>
