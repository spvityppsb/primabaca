<!DOCTYPE html>
<!--
Template Name: dashgrin - Responsive Bootstrap 4 Admin Dashboard Template
Author: Hencework

License: You must have a valid license purchased only from themeforest to legally use the template for your project.
-->
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>SI - Perpustakaan</title>
    <meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    {{-- {{-- <link rel="icon" href="/perpus/logo.png" type="image/x-icon"> --}}

    @yield('css')

    <!-- Toggles CSS -->
    <link href="/theme/vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="/theme/vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="/theme/dist/css/style.css" rel="stylesheet" type="text/css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <style>
        @media print {
            .noPrint {
                display: none;
            }
        }
    </style>
</head>

<body>


    <!-- HK Wrapper -->
    <div class="hk-wrapper hk-vertical-nav">

        <!-- Top Navbar -->

        @include('petugas.theme.topbar')

        <!-- Vertical Nav -->
        @include('petugas.theme.navbar')
        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
        <!-- /Vertical Nav -->

        <!-- Setting Panel -->
        <div class="hk-settings-panel">
            <div class="nicescroll-bar position-relative">
                <div class="settings-panel-wrap">
                    <div class="settings-panel-head">
                        {{-- <img class="brand-img d-inline-block align-top" src="dist/img/logo-light.png" alt="brand" /> --}}
                        <a href="javascript:void(0);" id="settings_panel_close" class="settings-panel-close"><span
                                class="feather-icon"><i data-feather="x"></i></span></a>
                    </div>

                    <hr>
                    <h6 class="mb-5">Navigation</h6>
                    <p class="font-14">Menu comes in two modes: dark & light</p>
                    <div class="button-list hk-nav-select mb-10">
                        <button type="button" id="nav_light_select"
                            class="btn btn-outline-success btn-sm btn-wth-icon icon-wthot-bg"><span
                                class="icon-label"><i class="fa fa-sun-o"></i> </span><span class="btn-text">Light
                                Mode</span></button>
                        <button type="button" id="nav_dark_select"
                            class="btn btn-outline-light btn-sm btn-wth-icon icon-wthot-bg"><span class="icon-label"><i
                                    class="fa fa-moon-o"></i> </span><span class="btn-text">Dark Mode</span></button>
                    </div>
                    <hr>
                    <h6 class="mb-5">Top Nav</h6>
                    <p class="font-14">Choose your liked color mode</p>
                    <div class="button-list hk-navbar-select mb-10">
                        <button type="button" id="navtop_light_select"
                            class="btn btn-outline-light btn-sm btn-wth-icon icon-wthot-bg"><span class="icon-label"><i
                                    class="fa fa-sun-o"></i> </span><span class="btn-text">Light Mode</span></button>
                        <button type="button" id="navtop_dark_select"
                            class="btn btn-outline-success btn-sm btn-wth-icon icon-wthot-bg"><span
                                class="icon-label"><i class="fa fa-moon-o"></i> </span><span class="btn-text">Dark
                                Mode</span></button>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>Scrollable Header</h6>
                        <div class="toggle toggle-sm toggle-simple toggle-light toggle-bg-success scroll-nav-switch">
                        </div>
                    </div>
                    <button id="reset_settings" class="btn btn-primary btn-block btn-reset mt-30">Reset</button>
                </div>
            </div>
        </div>
        <!-- /Setting Panel -->

        <!-- Main Content -->
        <div class="hk-pg-wrapper">

            @yield('content')

            <!-- Footer -->
            <div class="hk-footer-wrap container-fluid px-xxl-65 px-xl-20 noPrint">
                <footer class="footer">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <p>Perpustakaan<a href="#" class="text-dark" target="_blank">Primabaca</a>©
                                Copyrights <span id="year"></span> | Repost by <a
                                    href='https://www.instagram.com/iiersya' title='https://www.instagram.com/iiersya'
                                    target='_blank'>iiersya</a>

                            </p>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- /Footer -->
        </div>
        <!-- /Main Content -->

    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
        let startYear = 1800;
        let endYear = new Date().getFullYear();
        for (i = endYear; i > startYear; i--) {
            $('#tahun_terbit').append($('<option />').val(i).html(i));
        }
    </script>
    <!-- /HK Wrapper -->

    <!-- jQuery -->
    {{-- <script src="/theme/vendors/jquery/dist/jquery.min.js"></script> --}}

    <!-- Bootstrap Core JavaScript -->
    <script src="/theme/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="/theme/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Slimscroll JavaScript -->
    <script src="/theme/dist/js/jquery.slimscroll.js"></script>

    @yield('js')

    <!-- Fancy Dropdown JS -->
    <script src="/theme/dist/js/dropdown-bootstrap-extended.js"></script>

    <!-- Toggles JavaScript -->
    <script src="/theme/vendors/jquery-toggles/toggles.min.js"></script>
    <script src="/theme/dist/js/toggle-data.js"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="/theme/dist/js/feather.min.js"></script>

    <!-- Init JavaScript -->
    <script src="/theme/dist/js/init.js"></script>
    <script>
        document.getElementById("year").innerHTML = new Date().getFullYear();
    </script>

</body>

</html>
