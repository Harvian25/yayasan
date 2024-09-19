<!DOCTYPE html>
<html lang="en">

<head>
    <title>Firdaus</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Overpass:300,400,500|Dosis:400,700" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/animate.css">
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="/assets/css/aos.css">
    <link rel="stylesheet" href="/assets/css/ionicons.min.css">
    <link rel="stylesheet" href="/assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/assets/css/jquery.timepicker.css">
    <link rel="stylesheet" href="/assets/css/flaticon.css">
    <link rel="stylesheet" href="/assets/css/icomoon.css">
    <link rel="stylesheet" href="/assets/css/fancybox.min.css">

    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

   
    @include('beranda.navbar')

    <div class="block-31" style="position: relative;">
        @include('beranda.mainBackground')
    </div>

    <div id= "info-kami" class="site-section section-counter">
        @include('beranda.profilYayasan')
    </div>

    <div id="berita" class="site-section fund-raisers bg-light">
        @include('beranda.berita')
    </div> 


    <div class="site-section fund-raisers">
        @include('beranda.pendonasi')
    </div> 


    <div class="featured-section overlay-color-2" style="background-image: url('/assets/images/bg_2.jpg');">

        <div class="container" id="kontak_kami">
            <div class="row">

                <div class="col-md-6 mb-5 mb-md-0">
                    <div class="card" style="border:3px solid;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15863.29843031125!2d107.2836356!3d-6.2867716!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e699d549d800f51%3A0x2f625148331bcc70!2sYayasan%20Roudhotul%20Firdaus!5e0!3m2!1sen!2sid!4v1725086740118!5m2!1sen!2sid"
                            width="500" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>

                <div class="col-md-6 pl-md-5">

                    <div class="form-volunteer">

                        <h2>Hubungi Kami</h2>
                        <form method="POST" action="{{ route('contact.send') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control py-2" id="name" name="name"
                                    placeholder="Masukan Namamu">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control py-2" id="email" name="email"
                                    placeholder="Masukan Email">
                            </div>
                            <div class="form-group">
                                <textarea name="message" id="" cols="30" rows="3" class="form-control py-2"
                                    placeholder="Berikan Pesan"></textarea>
                            
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-white px-5 py-2" value="Send">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>

<footer class="footer">
    <section class="d-flex flex-column align-items-center justify-content-center p-4 border-bottom">
        <div class="mb-3 text-center">
            <span>Hubungi kami di sosial media kami</span>
        </div>
        <div>
            <a href="https://www.facebook.com" target="_blank" style="margin: 0 10px; color: #3b5998;">
                <i class="fab fa-facebook fa-2x"></i>
            </a>
            <a href="https://www.twitter.com" target="_blank" style="margin: 0 10px; color: #1da1f2;">
                <i class="fab fa-twitter fa-2x"></i>
            </a>
            <a href="https://www.instagram.com" target="_blank" style="margin: 0 10px; color: #e4405f;">
                <i class="fab fa-instagram fa-2x"></i>
            </a>
            <a href="https://www.linkedin.com" target="_blank" style="margin: 0 10px; color: #0077b5;">
                <i class="fab fa-linkedin fa-2x"></i>
            </a>
        </div>
    </section>

    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2024 Copyright:
        <a class="text-reset fw-bold" href="https://mdbootstrap.com/">Yayasan Roudhotul Firdaus</a>
    </div>
</footer>

    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/jquery.easing.1.3.js"></script>
    <script src="/assets/js/jquery.waypoints.min.js"></script>
    <script src="/assets/js/jquery.stellar.min.js"></script>
    <script src="/assets/js/owl.carousel.min.js"></script>
    <script src="/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="/assets/js/bootstrap-datepicker.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

    <script src="/assets/js/jquery.fancybox.min.js"></script>

    <script src="/assets/js/aos.js"></script>
    <script src="/assets/js/jquery.animateNumber.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="/assets/js/google-map.js"></script>
    <script src="/assets/js/main.js"></script>

</body>

</html>
