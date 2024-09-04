<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Examin - Education and LMS Template">
    <!-- ========== Page Title ========== -->
    <link rel="icon" href="/perpus/logo.png" type="image/x-icon">
    <title>Primabaca YPPSB</title>

    <!-- ========== Start Stylesheet ========== -->
    <link href="/dashboard/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/dashboard/assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/dashboard/assets/css/flaticon-set.css" rel="stylesheet" />
    <link href="/dashboard/assets/css/elegant-icons.css" rel="stylesheet" />
    <link href="/dashboard/assets/css/magnific-popup.css" rel="stylesheet" />
    <link href="/dashboard/assets/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="/dashboard/assets/css/owl.theme.default.min.css" rel="stylesheet" />
    <link href="/dashboard/assets/css/animate.css" rel="stylesheet" />
    <link href="/dashboard/assets/css/bootsnav.css" rel="stylesheet" />
    <link href="/dashboard/style.css" rel="stylesheet">
    <link href="/dashboard/assets/css/responsive.css" rel="stylesheet" />
    <!-- ========== End Stylesheet ========== -->
    <!-- ========== Google Fonts ========== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet">

    <!-- Add the slick-theme.css if you want default styling -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

</head>

<body>
    <!-- Preloader Start -->
    <div class="se-pre-con"></div>
    <!-- Preloader Ends -->

    <!-- Header
    ============================================= -->
    <header id="home">

        <!-- Start Navigation -->
        <nav class="navbar navbar-default navbar-sticky bootsnav">
            <div class="container">
                <div class="row">
                    <div class="top-search">
                        <div class="input-group">
                            <form action="{{ route('home.cari') }}" method="get">
                                @csrf
                                <input type="text" placeholder="Cari Judul Buku" class="form-control" name="buku">
                                <button type="submit">
                                    <i class="fa fa-search" style="color: white"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search" style="color: white"></i></a></li>
                    </ul>
                </div>
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars" style="color: white"></i>
                    </button>
                    <a class="navbar-brand" href="/">
                        <img src="/perpus/logo.png" class="logo" alt="Logo" width="60px" height="80px">
                    </a>
                </div>
                <!-- End Header Navigation -->
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right" data-in="#" data-out="#">
                        <li class="{{ request()->is('/') ? 'active' : '' }}">
                            <a href="/">Home</a>
                        </li>
                        <li class="{{ request()->is('tata-tertib') ? 'active' : '' }}">
                            <a href="{{ route('home.tata') }}">Tata Tertib</a>
                        </li>
                        <li class="dropdown">
                            <a href="#"
                                class="dropdown-toggle active {{ request()->is('buku*') ? 'active' : '' }}"
                                data-toggle="dropdown">Koleksi</a>
                            <ul class="dropdown-menu">
                                <li class="{{ request()->is('buku*') ? 'active' : '' }}">
                                    <a href="{{ route('home.buku_baru') }}">Koleksi Terbaru</a>
                                </li>
                                <li class="{{ request()->is('buku*') ? 'active' : '' }}">
                                    <a href="{{ route('home.buku') }}">Koleksi Umum</a>
                                </li>
                                <li class="{{ request()->is('request_buku*') ? 'active' : '' }}">
                                    <a href="{{ route('home.request_buku') }}">Request Buku</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#"
                                class="dropdown-toggle active {{ request()->is('berita*') ? 'active' : '' }}"
                                data-toggle="dropdown">Berita</a>
                            <ul class="dropdown-menu">
                                <li class="{{ request()->is('berita*') ? 'active' : '' }}">
                                    <a href="{{ route('home.artikel') }}">Artikel</a>
                                </li>
                                {{-- <li class="{{ request()->is('buku*') ? 'active' : '' }}">
                                    <a href="{{ route('home.galeri') }}">Galeri</a>
                                </li> --}}
                            </ul>
                        </li>
                        <li class="{{ request()->is('layanan') ? 'active' : '' }}">
                            <a href="{{ route('home.layanan') }}">Layanan Kami</a>
                        </li>
                        <li class="{{ request()->is('tentang-kami') ? 'active' : '' }}">
                            <a href="{{ route('home.visi') }}">Tentang Kami</a>
                        </li>
                        <li class="{{ request()->is('kontak') ? 'active' : '' }}">
                            <a href="{{ route('home.kontak') }}">Kontak</a>
                        </li>
                        @auth
                            <li class="side-menu"><a href="{{ url('/home') }}"><i class="fa fa-user"></i></a></li>
                        @else
                            <li class="side-menu"><a href="{{ route('login') }}"><i class="fa fa-user"></i></a></li>
                        @endauth
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>

        </nav>
        <!-- End Navigation -->

    </header>
    <!-- End Header -->

    <!-- Start Banner
    ============================================= -->

    @yield('content')
    <footer>
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <p>Perpustakaan <a href="#" class="text-dark" target="_blank">Primabaca </a>©
                                Copyrights <span id="year"></span> | Created by <a
                                    href='https://www.instagram.com/rzaykey' title='https://www.instagram.com/rzaykey'
                                    target='_blank'>rzaykey</a>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
    <!-- jQuery Frameworks
    ============================================= -->
    <script src="/dashboard/assets/js/jquery-1.12.4.min.js"></script>
    <script src="/dashboard/assets/js/bootstrap.min.js"></script>
    <script src="/dashboard/assets/js/equal-height.min.js"></script>
    <script src="/dashboard/assets/js/jquery.appear.js"></script>
    <script src="/dashboard/assets/js/jquery.easing.min.js"></script>
    <script src="/dashboard/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="/dashboard/assets/js/modernizr.custom.13711.js"></script>
    <script src="/dashboard/assets/js/owl.carousel.min.js"></script>
    <script src="/dashboard/assets/js/wow.min.js"></script>
    <script src="/dashboard/assets/js/isotope.pkgd.min.js"></script>
    <script src="/dashboard/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="/dashboard/assets/js/count-to.js"></script>
    <script src="/dashboard/assets/js/loopcounter.js"></script>
    <script src="/dashboard/assets/js/jquery.nice-select.min.js"></script>
    <script src="/dashboard/assets/js/bootsnav.js"></script>
    <script src="/dashboard/assets/js/main.js"></script>
    <script src="/dashboard/assets/js/slick.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

</body>

<script async src='https://d2mpatx37cqexb.cloudfront.net/delightchat-whatsapp-widget/embeds/embed.min.js'></script>
<script>
    var wa_btnSetting = {
        "btnColor": "#16BE45",
        "ctaText": "WhatsApp Us",
        "cornerRadius": 40,
        "marginBottom": 20,
        "marginLeft": 20,
        "marginRight": 20,
        "btnPosition": "right",
        "whatsAppNumber": "628115564111",
        "welcomeMessage": "hii primabaca, ",
        "zIndex": 999999,
        "btnColorScheme": "light"
    };
    var wa_widgetSetting = {
        "title": "Primabaca Perpustakaan",
        "subTitle": "Typically replies in a day",
        "headerBackgroundColor": "#FBFFC8",
        "headerColorScheme": "dark",
        "greetingText": "Hi there! \nHow can I help you?",
        "ctaText": "Start Chat",
        "btnColor": "#1A1A1A",
        "cornerRadius": 40,
        "welcomeMessage": "Hello",
        "btnColorScheme": "light",
        "brandImage": "https://uploads-ssl.webflow.com/5f68a65cd5188c058e27c898/6204c4267b92625c9770f687_whatsapp-chat-widget-dummy-logo.png",
        "darkHeaderColorScheme": {
            "title": "#333333",
            "subTitle": "#4F4F4F"
        }
    };
    window.onload = () => {
        _waEmbed(wa_btnSetting, wa_widgetSetting);
    };
</script>

</html>
