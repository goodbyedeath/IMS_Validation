<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>IMS-Validation</title>

        <link rel="stylesheet" type="image/png" href="{{ asset('front/logo/logo-ims.png')}}">

        <!-- All CSS -->
        <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('front/css/bootstrap-datepicker.min.css')}}">
        <link rel="stylesheet" href="{{ asset('front/css/jquery-ui.css')}}">
        <link rel="stylesheet" href="{{ asset('front/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{ asset('front/css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{ asset('front/css/select2.min.css')}}">
        <link rel="stylesheet" href="{{ asset('front/css/select2-bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('front/css/all.css')}}">
        <link rel="stylesheet" href="{{ asset('front/css/meanmenu.css')}}">
        <link rel="stylesheet" href="{{ asset('front/css/spacing.css')}}">
        <link rel="stylesheet" href="{{ asset('front/css/style.css')}}">
        
        <!-- All Javascripts -->
        <script src="{{ asset('front/js/jquery-3.6.1.min.js') }}"></script>
        <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('front/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('front/js/jquery-ui.js') }}"></script>
        <script src="{{ asset('front/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('front/js/wow.min.js') }}"></script>
        <script src="{{ asset('front/js/select2.full.js') }}"></script>
        <script src="{{ asset('front/js/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('front/js/moment.min.js') }}"></script>
        <script src="{{ asset('front/js/counterup.min.js') }}"></script>
        <script src="{{ asset('front/js/multi-countdown.js') }}"></script>
        <script src="{{ asset('front/js/jquery.meanmenu.js') }}"></script>

        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>
    <body>

            @yield('front-main')

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="copyright">
                            Copyright &copy; 2024, PT. IMS Indonesia. All Rights Reserved.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="scroll-top">
            <i class="fas fa-angle-up"></i>
        </div>

        <script src="{{ asset('front/js/custom.js') }}"></script>
    </body>
</html>
