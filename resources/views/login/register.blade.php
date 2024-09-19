<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register-Firdaus</title>
    <link href="/nice-admin/assets/css/style.css" rel="stylesheet">
    <link rel='stylesheet' href='/assets/css/bootstrap.min.css'>
    <link rel='stylesheet' href='/assets/css/animate.min.css'>
    <link rel='stylesheet' href="/assets/css/font-awesome.min.css" />
    <link rel='stylesheet' href="/assets/css/style.css" />
    <link rel="stylesheet" href="/assets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link href="/nice-admin/assets/css/style.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Raleway:200,300,400,500,600,700,800' rel='stylesheet'
        type='text/css'>

    <link rel="shortcut icon" href="#">
</head>

<body>
    <section>
        <div class="container">
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
                                <h5 class="card-title text-center medium pb-0 fs-4">Buat Akun</h5>
                                <p class="text-center medium">Daftar dengan mudah dengan isi form ini</p>
                            </div>

                            <form class="row needs-validation" action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="col-12 mb-3">
                                    <label for="yourName" class="form-label">Nama</label>
                                    <input type="text" name="name" class="form-control" id="yourName" required>
                                    <div class="invalid-feedback">Please, enter your name!</div>
                                </div>


                                <div class="col-12 mb-3">
                                    <label for="yourEmail" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="yourEmail" required>
                                    <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="phone_number" class="form-label">No Hp (Whatsapp)</label>
                                    <input type="text" name="phone_number" class="form-control"
                                        value="{{ old('phone_number') }}" required>
                                    @error('phone_number')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="yourPassword" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="yourPassword"
                                        required>
                                    <div class="invalid-feedback">Please enter your password!</div>
                                </div>
                                <div class="col-12 mb-3">
                                    <button class="btn btn-primary w-100" type="submit">Create Account</button>
                                </div>

                            </form>
                            <div class="text-center mt-5">
                                <p class="medium">Udah punya akun? <a href="/login">Login Disini</a></p>
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
        Copyright &copy; <a href="#">Your Agency</a>
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
</body>

</html>
