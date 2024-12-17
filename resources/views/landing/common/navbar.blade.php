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
                    <a href="#"><span>Most Trending Categories</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        @foreach($templateCategories as $categoryItem)
                            <li><a href="{{url('/')}}/market-place?&category={{$categoryItem->slug}}">{{$categoryItem->category_name}}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        @auth()
            <a class="btn-getstarted" href="#about">{{auth()->user()->name}}</a>
        @else
            <a class="btn-getstarted" href="{{route('landing.loginPage')}}">Get Started</a>
        @endauth


    </div>
</header>
