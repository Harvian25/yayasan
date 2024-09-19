<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>LOGIN - Firdaus</title>
    <link rel='stylesheet' href='/assets/css/bootstrap.min.css'>
    <link rel='stylesheet' href='/assets/css/animate.min.css'>
    <link rel='stylesheet' href="/assets/css/font-awesome.min.css" />
    <link rel='stylesheet' href="/assets/css/style.css" />
    <link href="/nice-admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/nice-admin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/nice-admin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/nice-admin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="/nice-admin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="/nice-admin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/nice-admin/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  
    <link href="/nice-admin/assets/css/style.css" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Raleway:200,300,400,500,600,700,800' rel='stylesheet'
        type='text/css'>


    <link rel="shortcut icon" href="#">
</head>

<body>
    <section class="section " style="min-height: 100vh; background: #e8e8e8 ">
        <div class="container ">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                    <div class="d-flex justify-content-center py-4">
                        <a href="/" class="d-flex align-items-center w-auto">
                            <img src="/assets/images/logo.jpg" alt="" height="100" width="100">
        
                        </a>
                    </div>

                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Login dan Bantu Kami</h5>
                                <p class="text-center small">Masukan email dan password untuk login</p>
                            </div>
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session()->has('loginError'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('loginError') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            <form class="row justify-content-center" action="{{ route('authenticate') }}"
                                method="POST">
                                @csrf
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <div class="input-group">
                                            <input type="email" name="email" class="form-control" id="email"
                                                required>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="yourPassword"
                                            required>
                                        <div class="invalid-feedback">Please enter your password!</div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">Login</button>
                                </div>
                            </form>

                            <div class="text-center mt-5">
                                <p class="medium">Belum punya akun? <a href="/register">Daftar Disini</a></p>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <section id="credits" class="text-center">
        <span class="social wow zoomIn">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-skype"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest"></i></a>
            <a href="#"><i class="fa fa-google-plus"></i></a>
        </span><br />
        Copyright &copy; <a href="#">Yayasan Rudhotul Firdaus</a>
        <br />Template By <i class="fa fa-heart"></i> WowThemes.Net
    </section>

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/waypoints.min.js"></script>
    <script src="/assets/js/jquery.scrollTo.min.js"></script>
    <script src="/assets/js/jquery.localScroll.min.js"></script>
    <script src="/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="/assets/js/validate.js"></script>
    <script src="/assets/js/common.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
</body>

</html>
