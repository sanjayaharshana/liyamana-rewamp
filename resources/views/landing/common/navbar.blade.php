<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
        <a href="" class="logo d-flex align-items-center me-auto">
            <img src="{{url('landing_pages/banding/liyamana_logo.png')}}" style="filter: invert()" alt="">
        </a>

        <nav id="navmenu" class="navmenu">
            <ul class="main-nav">
                <li><a href="{{url('/')}}" class="active">Home</a></li>
                <li><a href="{{url('market-place')}}">Market Place</a></li>
                <li><a href="{{url('help-and-support')}}">Help and Support</a></li>
                <li><a href="{{url('artistic-area')}}">Artistic Area</a></li>
                <li><a href="{{url('about-us')}}">About Us</a></li>
                <li class="has-mega-menu dropdown">
                    <a href="#" class="mega-menu-trigger">
                        Most Trending Categories
                        <i class="bi bi-chevron-down toggle-dropdown"></i>
                    </a>
                    <div class="mega-menu">
                        <div class="mega-menu-inner">
                            <div class="mega-menu-grid">
                                <!-- Update only this part in your blade file -->
                                @foreach($templateCategories->chunk(ceil($templateCategories->count() / 3)) as $categoryChunk)
                                    <div class="mega-menu-column">
                                        @foreach($categoryChunk as $categoryItem)
                                            <div class="mega-menu-item">
                                                <a href="{{url('/')}}/market-place?&category={{$categoryItem->slug}}">
                                                    <span class="icon"><i class="bi bi-grid"></i></span>
                                                    <span class="text">{{$categoryItem->category_name}}</span>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
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
