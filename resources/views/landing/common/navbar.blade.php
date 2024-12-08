<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="index.html" class="logo d-flex align-items-center me-auto">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="{{url('landing_pages/banding/liyamana_logo.png')}}" style="filter: invert()" alt="">
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{url('/')}}" class="active">Home</a></li>
                <li><a href="{{url('market-place')}}">Market Place</a></li>
                <li><a href="{{url('help-and-support')}}">Help and Support</a></li>
                <li><a href="{{url('artistic-area')}}">Artistic Area</a></li>
                <li><a href="{{url('about-us')}}">About Us</a></li>
                <li class="dropdown">
                    <a href="#"><span>Categories</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="#">Romance</a></li>
                        <li class="dropdown">
                            <a href="#">
                                <span>Generatal</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="#">Deep Dropdown 1</a></li>
                                <li><a href="#">Deep Dropdown 2</a></li>
                                <li><a href="#">Deep Dropdown 3</a></li>
                                <li><a href="#">Deep Dropdown 4</a></li>
                                <li><a href="#">Deep Dropdown 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Funny</a></li>
                        <li><a href="#">Friendship</a></li>
                        <li><a href="#">Celebration</a></li>
                    </ul>
                </li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        @auth()
            <a class="btn-getstarted" href="#about">{{auth()->user()->name}}</a>
        @else
            <a class="btn-getstarted" href="#about">Get Started</a>
        @endauth


    </div>
</header>
