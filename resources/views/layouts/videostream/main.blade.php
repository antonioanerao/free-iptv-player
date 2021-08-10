<!doctype html>
<html lang="{{ env('APP_LANG') }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>

    <link rel="shortcut icon" href="{{ asset('assets/video-stream/images/fav.jpg') }}">
    <link rel="stylesheet" href="{{ asset('assets/video-stream/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/video-stream/css/fontawsom-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/video-stream/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/video-stream/css/style.css') }}"/>
    @yield('css')
</head>

<body>

<!--####################### Header Starts Here ###################-->
<header class="continer-fluid ">
    <div class="header-top">
        <div class="container">
            <div class="row col-det">
                <div class="col-lg-6 d-none d-lg-block">
                    <ul class="ulleft">
                        <li>
                            <i class="far fa-envelope"></i>
                            mail@domain.com
                            <span>|</span></li>
                        <li>
                            <i class="far fa-clock"></i>
                            Service Time : 12:AM</li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-12">
                    <ul class="ulright">
                        @if(request()->session()->get('login') == env('IPTV_USER'))
                            <li>
                                <a href="{{ route('admin.dashboard') }}"><i class="fas fa-user-cog"></i>
                                    Admin Panel
                                </a>
                            </li>
                        @endif

                        <li>
                            <a  href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-arrow-left"></i> {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="row nav-row">
                <div class="col-md-3 logo">
                    <a href="{{ route('index') }}"><img src="{{ asset('assets/video-stream/images/logo.jpg') }}" alt=""></a>
                </div>
                <div class="col-md-9 nav-col">
                    <nav class="navbar navbar-expand-lg navbar-light">

                        <button
                            class="navbar-toggler"
                            type="button"
                            data-toggle="collapse"
                            data-target="#navbarNav"
                            aria-controls="navbarNav"
                            aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('index') }}">Home</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('livetv.groups') }}">Live TV</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('movies.groups') }}">Movies</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('series.groups') }}">Series</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>

@yield('content')


<!--####################### Quote Starts Here ###################-->
<div class="footer-ablove">
    <div class="container">
        <div class="row">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit?
                <button class="btn btn-default">Get Quote</button>
            </p>
        </div>
    </div>
</div>

<!--####################### Footer Starts Here ###################-->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 about col-sm-12">
                <h2>
                    <i class="fas fa-info-circle"></i>
                    About Us</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi dolor illo in inventore ipsa
                    laudantium maxime minus molestiae nam, nobis odio omnis quas qui sit veniam voluptatem
                    voluptatibus! Dolorem, sed?
                </p>

            </div>
            <div class="col-md-3 col-sm-12">
                <h2>
                    <i class="fas fa-link"></i>
                    Useful Links</h2>
                <ul class="list-unstyled link-list">
                    <li>
                        <a ui-sref="about" href="#/about">About us</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a ui-sref="portfolio" href="#/portfolio">Portfolio</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a ui-sref="products" href="#/products">Latest jobs</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a ui-sref="gallery" href="#/gallery">Gallery</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a ui-sref="contact" href="#/contact">Contact us</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-12">
                <h2>
                    <i class="fas fa-life-ring"></i>
                    Get Support</h2>
                <ul class="list-unstyled link-list">
                    <li>
                        <a ui-sref="about" href="#/about">About us</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a ui-sref="portfolio" href="#/portfolio">Portfolio</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a ui-sref="products" href="#/products">Latest jobs</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a ui-sref="gallery" href="#/gallery">Gallery</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a ui-sref="contact" href="#/contact">Contact us</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-12 map-img">
                <h2>
                    <i class="fas fa-map-marker-alt"></i>
                    Contact Us</h2>
                <address class="md-margin-bottom-40">
                    xxxx
                    <br>
                    xxxx (Brazil)
                    <br>
                    xxxxxx, xx
                    <br>
                    Phone: +xx xxxx-xxxx
                    <br>
                    Email:
                    <a href="mailto:mail@domain.com" class="">mail@domain.com</a><br>
                    Web:
                    <a href="smart-eye.html" class="">www.bluedart.in</a>
                </address>

            </div>
        </div>
    </div>

</footer>
<div class="copy">
    <div class="container">
        <a href="https://www.smarteyeapps.com/" target="_blank">All Rights Reserved | Design by Smarteyeapps</a>

        <span>
                    <a href="">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="">
                        <i class="fab fa-pinterest-p"></i>
                    </a>
                    <a href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </span>
    </div>

</div>
</body>
<script src="{{ asset('assets/video-stream/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/video-stream/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/video-stream/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/video-stream/plugins/scroll-fixed/jquery-scrolltofixed-min.js') }}"></script>
<script src="{{ asset('assets/video-stream/js/script.js') }}"></script>
@yield('js')
</html>
