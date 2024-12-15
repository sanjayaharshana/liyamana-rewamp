<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Liyamana - Online Letter Platform</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{url('landing_pages/assets/img/favicon.png')}}" rel="icon">
    <link href="{{url('landing_pages/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{url('landing_pages/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('landing_pages/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{url('landing_pages/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{url('landing_pages/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{url('landing_pages/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    @stack('head-css')
    @stack('head-js')
    <!-- Main CSS File -->
    <link href="{{url('landing_pages/assets/css/main.css')}}" rel="stylesheet">
    <style>
        .index-page .header {
            --background-color: rgba(255, 255, 255, 0);
            --heading-color: #ffffff;
            --nav-color: #ffffff;
            background: #8b262f;
        }
    </style>

</head>

<body class="index-page">

@include('landing.common.navbar')

<main class="main">


    @yield('content')


</main>

@if(View::hasSection('footer'))
    <footer id="footer" class="footer">



        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="" class="d-flex align-items-center">
                        <span class="sitename">Xelenic</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>A108 Adam Street</p>
                        <p>New York, NY 535022</p>
                        <p class="mt-3"><strong>Phone:</strong> <span>+94 71 487 97 96</span></p>
                        <p><strong>Email:</strong> <span>support@liyamana.com</span></p>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{url('market-place')}}">Market Place</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{url('services')}}">Services</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{url('terms-and-services')}}">Terms of service</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        @foreach($templateCategories->take(4) as $itemCatesItem)
                            <li><i class="bi bi-chevron-right"></i> <a href="{{url('market-place?category='.$itemCatesItem->slug)}}">{{$itemCatesItem->category_name}}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12">
                    <h4>Follow Us</h4>
                    <p>You can follow your social media connections</p>
                    <div class="social-links d-flex">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Liyamana</strong> <span>All Rights Reserved</span></p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Designed by <a href="https://xelenic.com/">Xelenic</a>
            </div>
        </div>

    </footer>


@endif


<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="{{url('landing_pages/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('landing_pages/assets/vendor/php-email-form/validate.js')}}"></script>
<script src="{{url('landing_pages/assets/vendor/aos/aos.js')}}"></script>
<script src="{{url('landing_pages/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{url('landing_pages/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{url('landing_pages/assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
<script src="{{url('landing_pages/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{url('landing_pages/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>

<script>
    // Register the service worker
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', function() {
            navigator.serviceWorker.register('/service-worker.js').then(function(registration) {
                console.log('ServiceWorker registration successful with scope: ', registration.scope);
            }, function(err) {
                console.log('ServiceWorker registration failed: ', err);
            });
        });
    }

</script>

@stack('footer-js')
<!-- Main JS File -->
<script src="{{url('landing_pages/assets/js/main.js')}}"></script>

</body>

</html>
