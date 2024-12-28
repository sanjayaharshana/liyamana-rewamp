<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'Liyamana Online Platform - World leading online platform for custom letters')</title>
    <meta name="description" content="@yield('meta_description', 'Liyamana - A unique platform to send heartfelt letters to friends, loved ones, and connect with pen pals worldwide. Personalize your communication and revive the magic of handwritten messages.')">
    <meta name="keywords" content="@yield('meta_keywords', 'Liyamana, send letters online, heartfelt letters, pen pals, personalized communication, write letters, commercial letters, connect with friends')">

    <!-- Favicons -->
    <link href="{{url('landing_pages/assets/img/favicon.ico')}}" rel="icon">
    <link href="{{url('landing_pages/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <meta property="og:image" content="{{url('landing_pages/assets/img/link_cover.png')}}">

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

.has-mega-menu {
    position: relative;
}

.mega-menu-trigger {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 15px;
    color: #333;
    cursor: pointer;
}

.mega-menu {
    position: absolute;
    top: 100%;
    left: -160px; /* Changed from right: 0 to left: 50% */
    width: 100vw;
    max-height: 80vh;
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 8px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
    z-index: 1000;
    overflow-y: auto;
    transform: translateX(-50%);
    background: radial-gradient(
        circle,
        rgba(44, 2, 11, 0.3) 0%, /* Subtle dark red center */
        rgba(153, 26, 26, 0.2) 50%, /* Muted red for modern contrast */
        rgba(11, 11, 44, 0.4) 100% /* Deep blue-black outer glow */
    );
    backdrop-filter: blur(15px); /* Glassy blur effect */
    -webkit-backdrop-filter: blur(15px); /* Ensures Safari compatibility */
    border: 1px solid rgba(255, 255, 255, 0.2); /* Light translucent border */
    animation: colorShift 10s infinite alternate; /* Smooth color animation */
    transition: background 0.2s ease-in-out; /* Smooth transition effect */
}

@keyframes colorShift {
    0% {
        background: radial-gradient(
            circle,
            rgba(69, 10, 10, 0.3) 0%, /* Rich dark red center */
            rgba(140, 26, 26, 0.3) 50%, /* Highlighted red */
            rgba(11, 11, 44, 0.4) 100% /* Dark, modern blue-black */
        );
    }
    50% {
        background: radial-gradient(
            circle,
            rgba(44, 2, 11, 0.3) 0%, /* Deep red tint */
            rgba(153, 26, 26, 0.25) 50%, /* Muted red gradient */
            rgba(10, 10, 30, 0.4) 100% /* Subtle darker glow */
        );
    }
    100% {
        background: radial-gradient(
            circle,
            rgba(11, 2, 11, 0.3) 0%, /* Dark maroon-red center */
            rgba(140, 26, 26, 0.3) 50%, /* Modern red balance */
            rgba(11, 11, 44, 0.4) 100% /* Deep blue-black */
        );
    }
}

.mega-menu-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 15px;
    min-width: 100%;
}

.mega-menu-inner {
    padding: 25px;
    width: 100%; /* Added to ensure full width */
}

.mega-menu-column {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.mega-menu-item {
    position: relative;
}

.mega-menu-item a {
    display: flex;
    align-items: center;
    padding: 10px 15px;
    color: #f1f1f1;
    text-decoration: none;
    border-radius: 6px;
    transition: all 0.1s ease;
    -webkit-backdrop-filter: blur(5px);
    font-size: 12px;
    min-height: 50px;
    margin-top: -17px;
}

.mega-menu-item a:hover {
    background: rgba(255, 255, 255, 0.3);
    color: #fff;
    font-weight: bold; /* Makes the text bold */
    transform: translateX(5px);
    font-size: 12px;
    text-shadow: #000 1px 0 5px;
    letter-spacing: 1px; /* Adds letter spacing */
}

.mega-menu-item .icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    margin-right: 12px;
    background: rgba(255, 255, 255, 0.2); /* Match the glassy look */
    border-radius: 6px;
    -webkit-backdrop-filter: blur(5px);
}
.mega-menu-item .text {
    flex: 1;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    white-space: normal;
    line-height: 1.2;
}
.has-mega-menu:hover .mega-menu {
    opacity: 1;
    visibility: visible;
}

/* Custom Scrollbar */
.mega-menu::-webkit-scrollbar {
    width: 6px;
}

.mega-menu::-webkit-scrollbar-track {
    background: #f1f1f1;
}

.mega-menu::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 3px;
}

/* Responsive Styles */
/* Add/Update these mobile-specific styles */
@media (max-width: 1200px) {
    .mega-menu-grid {
        gap: 10px;
    }

    .mega-menu-item a {
        font-size: 11px;
    }
}
@media (max-width: 991px) {
    .navmenu.active {
        display: block !important;
    }
    .mega-menu {
        position: fixed;
        top: 40px; /* Adjust based on your header height */
        left: 0;
        width: 100%;
        height: calc(100vh - 40px);
        transform: translateX(-100%);
        opacity: 1;
        visibility: visible;
        transition: transform 0.3s ease-in-out;
        border-radius: 0;
        overflow-y: auto;
        -webkit-overflow-scrolling: touch;
    }

    .menu-active .mega-menu {
        transform: translateX(0);
    }

    .mega-menu-grid {
        grid-template-columns: repeat(2, 1fr);
        padding: 10px;
    }

    .mega-menu-inner {
        padding: 15px;
    }

    .mega-menu-item a {
        padding: 15px;
        font-size: 14px;
    }

    .mobile-nav-toggle.bi-x {
        display: block !important;
    }

    .mega-menu-trigger {
        padding: 12px 20px;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .has-mega-menu {
        position: static;
    }

    /* Enhanced touch interactions */
    .mega-menu-item a {
        padding: 15px 20px;
        margin: 5px 0;
    }

    /* Improved mobile animations */
    .menu-active .mega-menu-item {
        animation: slideInRight 0.3s forwards;
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
}

/* Additional mobile optimizations */
@media (max-width: 576px) {
    .mega-menu {
        top: 60px; /* Adjust for smaller screens */
        height: calc(100vh - 60px);
    }

    .mega-menu-inner {
        padding: 10px;
    }

    .mega-menu-item a {
        padding: 12px 15px;
        font-size: 16px;
    }
    .mega-menu-grid {
        grid-template-columns: 1fr;
    }
}


/* Stagger animation for menu items */
.mega-menu-item:nth-child(1) { animation-delay: 0.1s; }
.mega-menu-item:nth-child(2) { animation-delay: 0.15s; }
.mega-menu-item:nth-child(3) { animation-delay: 0.2s; }
.mega-menu-item:nth-child(4) { animation-delay: 0.25s; }
.mega-menu-item:nth-child(5) { animation-delay: 0.3s; }
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
                        <li><i class="bi bi-chevron-right"></i> <a href="{{url('terms-and-conditions')}}">Terms and Conditions</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{url('privacy-policy')}}">Privacy Policy</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{url('refund-policy')}}">Refund Policy</a></li>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const megaMenuTrigger = document.querySelector('.mega-menu-trigger');
    const megaMenu = document.querySelector('.has-mega-menu');
    const mobileNav = document.querySelector('.mobile-nav-toggle');
    const navMenu = document.querySelector('.navmenu');

    function toggleMobileMenu(e) {
        e.preventDefault();
        navMenu.classList.toggle('active');
        mobileNav.classList.toggle('bi-list');
        mobileNav.classList.toggle('bi-x');
    }

    function toggleMegaMenu(e) {
        e.preventDefault();
        e.stopPropagation();
        megaMenu.classList.toggle('menu-active');
    }

    mobileNav.addEventListener('click', toggleMobileMenu);
    megaMenuTrigger.addEventListener('click', toggleMegaMenu);

    // Close mega menu when clicking outside
    document.addEventListener('click', function(e) {
        if (!megaMenu.contains(e.target)) {
            megaMenu.classList.remove('menu-active');
        }
    });

    // Reset on window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 991) {
            megaMenu.classList.remove('menu-active');
            navMenu.classList.remove('active');
            mobileNav.classList.remove('bi-x');
            mobileNav.classList.add('bi-list');
        }
    });
});

</script>
@stack('footer-js')
<!-- Main JS File -->
<script src="{{url('landing_pages/assets/js/main.js')}}"></script>

</body>

</html>
