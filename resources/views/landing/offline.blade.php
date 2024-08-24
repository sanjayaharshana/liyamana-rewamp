<html><head><style>
        /*! CSS Used from: http://localhost:8000/landing_pages/assets/vendor/bootstrap/css/bootstrap.min.css */
        *,::after,::before{box-sizing:border-box;}
        ul{padding-left:2rem;}
        ul{margin-top:0;margin-bottom:1rem;}
        ul ul{margin-bottom:0;}
        a{color:rgba(var(--bs-link-color-rgb),var(--bs-link-opacity,1));text-decoration:underline;}
        a:hover{--bs-link-color-rgb:var(--bs-link-hover-color-rgb);}
        img{vertical-align:middle;}
        .container-fluid,.container-xl{--bs-gutter-x:1.5rem;--bs-gutter-y:0;width:100%;padding-right:calc(var(--bs-gutter-x) * .5);padding-left:calc(var(--bs-gutter-x) * .5);margin-right:auto;margin-left:auto;}
        @media (min-width:1200px){
            .container-xl{max-width:1140px;}
        }
        @media (min-width:1400px){
            .container-xl{max-width:1320px;}
        }
        .dropdown{position:relative;}
        .fixed-top{position:fixed;top:0;right:0;left:0;z-index:1030;}
        .d-flex{display:flex!important;}
        .position-relative{position:relative!important;}
        .align-items-center{align-items:center!important;}
        .me-auto{margin-right:auto!important;}
        @media (min-width:1200px){
            .d-xl-none{display:none!important;}
        }
        /*! CSS Used from: http://localhost:8000/landing_pages/assets/vendor/bootstrap-icons/bootstrap-icons.css */
        .bi::before,[class*=" bi-"]::before{display:inline-block;font-family:bootstrap-icons!important;font-style:normal;font-weight:normal!important;font-variant:normal;text-transform:none;line-height:1;vertical-align:-.125em;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;}
        .bi-chevron-down::before{content:"\f282";}
        .bi-list::before{content:"\f479";}
        /*! CSS Used from: http://localhost:8000/landing_pages/assets/css/main.css */
        a{color:#dc3545;text-decoration:none;transition:0.3s;}
        a:hover{color:color-mix(in srgb, var(--accent-color), transparent 25%);text-decoration:none;}
        .header{--background-color: #830202;--heading-color:#ffffff;color:var(--default-color);background-color:var(--background-color);transition:all 0.5s;z-index:997;}
        .header .logo{line-height:1;}
        .header .logo img{max-height:36px;margin-right:8px;}
        .header .btn-getstarted,.header .btn-getstarted:focus{color:var(--contrast-color);background:#bd1c2b;font-size:14px;padding:8px 25px;margin:0 0 0 30px;border-radius:50px;transition:0.3s;}
        .header .btn-getstarted:hover,.header .btn-getstarted:focus:hover{color:var(--contrast-color);background:color-mix(in srgb, var(--accent-color), transparent 15%);}
        @media (max-width: 1200px){
            .header .logo{order:1;}
            .header .btn-getstarted{order:2;margin:0 15px 0 0;padding:6px 15px;}
            .header .navmenu{order:3;}
        }
        .index-page .header{--background-color:rgba(255, 255, 255, 0);--heading-color:#ffffff;--nav-color:#ffffff;}
        @media (min-width: 1200px){
            .navmenu{padding:0;}
            .navmenu ul{margin:0;padding:0;display:flex;list-style:none;align-items:center;}
            .navmenu li{position:relative;}
            .navmenu a,.navmenu a:focus{color:var(--nav-color);padding:18px 15px;font-size:15px;font-family:var(--nav-font);font-weight:400;display:flex;align-items:center;justify-content:space-between;white-space:nowrap;transition:0.3s;}
            .navmenu a i,.navmenu a:focus i{font-size:12px;line-height:0;margin-left:5px;transition:0.3s;}
            .navmenu li:last-child a{padding-right:0;}
            .navmenu li:hover>a,.navmenu .active,.navmenu .active:focus{color:var(--nav-hover-color);}
            .navmenu .dropdown ul{margin:0;padding:10px 0;background:var(--nav-dropdown-background-color);display:block;position:absolute;visibility:hidden;left:14px;top:130%;opacity:0;transition:0.3s;border-radius:4px;z-index:99;box-shadow:0px 0px 30px rgba(0, 0, 0, 0.1);}
            .navmenu .dropdown ul li{min-width:200px;}
            .navmenu .dropdown ul a{padding:10px 20px;font-size:15px;text-transform:none;color:var(--nav-dropdown-color);}
            .navmenu .dropdown ul a i{font-size:12px;}
            .navmenu .dropdown ul a:hover,.navmenu .dropdown ul li:hover>a{color:var(--nav-dropdown-hover-color);}
            .navmenu .dropdown:hover>ul{opacity:1;top:100%;visibility:visible;}
            .navmenu .dropdown .dropdown ul{top:0;left:-90%;visibility:hidden;}
            .navmenu .dropdown .dropdown:hover>ul{opacity:1;top:0;left:-100%;visibility:visible;}
        }
        @media (max-width: 1199px){
            .mobile-nav-toggle{color:var(--nav-color);font-size:28px;line-height:0;margin-right:10px;cursor:pointer;transition:color 0.3s;}
            .navmenu{padding:0;z-index:9997;}
            .navmenu ul{display:none;list-style:none;position:absolute;inset:60px 20px 20px 20px;padding:10px 0;margin:0;border-radius:6px;background-color:var(--nav-mobile-background-color);overflow-y:auto;transition:0.3s;z-index:9998;box-shadow:0px 0px 30px rgba(0, 0, 0, 0.1);}
            .navmenu a,.navmenu a:focus{color:var(--nav-dropdown-color);padding:10px 20px;font-family:var(--nav-font);font-size:17px;font-weight:500;display:flex;align-items:center;justify-content:space-between;white-space:nowrap;transition:0.3s;}
            .navmenu a i,.navmenu a:focus i{font-size:12px;line-height:0;margin-left:5px;width:30px;height:30px;display:flex;align-items:center;justify-content:center;border-radius:50%;transition:0.3s;background-color:color-mix(in srgb, var(--accent-color), transparent 90%);}
            .navmenu a i:hover,.navmenu a:focus i:hover{background-color:var(--accent-color);color:var(--contrast-color);}
            .navmenu a:hover,.navmenu .active,.navmenu .active:focus{color:var(--nav-dropdown-hover-color);}
            .navmenu .dropdown ul{position:static;display:none;z-index:99;padding:10px 0;margin:10px 20px;background-color:var(--nav-dropdown-background-color);border:1px solid color-mix(in srgb, var(--default-color), transparent 90%);box-shadow:none;transition:all 0.5s ease-in-out;}
            .navmenu .dropdown ul ul{background-color:rgba(33, 37, 41, 0.1);}
        }
        /*! CSS Used from: Embedded */
        .index-page .header{--background-color:rgba(255, 255, 255, 0);--heading-color:#ffffff;--nav-color:#ffffff;background:#8b262f;}
        /*! CSS Used fontfaces */
        @font-face{font-display:block;font-family:"bootstrap-icons";src:url("http://localhost:8000/landing_pages/assets/vendor/bootstrap-icons/fonts/bootstrap-icons.woff2?dd67030699838ea613ee6dbda90effa6") format("woff2"), url("http://localhost:8000/landing_pages/assets/vendor/bootstrap-icons/fonts/bootstrap-icons.woff?dd67030699838ea613ee6dbda90effa6") format("woff");}
    </style>

</head><body style="" data-new-gr-c-s-check-loaded="14.1192.0" data-gr-ext-installed="">


<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="index.html" class="logo d-flex align-items-center me-auto">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="http://localhost:8000/landing_pages/banding/liyamana_logo.png" style="filter: invert()" alt="">
        </a>

        <nav id="navmenu" class="navmenu" style="
    font-family: system-ui;
    color: white;
">
            <ul>
                <li><a href="http://localhost:8000" class="active">Home</a></li>
                <li><a href="http://localhost:8000/market-place">Market Place</a></li>
                <li><a href="http://localhost:8000/help-and-support">Help and Support</a></li>
                <li><a href="http://localhost:8000/artistic-area">Artistic Area</a></li>
                <li><a href="http://localhost:8000/about-us">About Us</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
    </div>
</header>

<div style="margin-bottom: 100px;text-align: center">
    <h2>Harry Potter</h2>
</div>


</body></html>
