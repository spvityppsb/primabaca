@extends('layouts.master')

@section('content')
    <div class="breadcrumb-area shadow dark text-center bg-fixed text-light"
        style="background-image: url(/perpus/img-1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>TENTANG KAMI</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="about-area default-padding">
        <div class="container">
            <div class="row">
                <div class="about-info">
                    <div class="col-md-6 thumb">
                        <img src="storage/{{ $about->foto }}" alt="Thumb" class="text-center">
                    </div>
                    <div class="col-md-6 info">
                        <h5>Profile Perpustakaan</h5>
                        <h2>Selamat Datang Di Perpustakaan Primabaca YPPSB</h2>
                        <p>
                            {{ $about->profil }}
                        </p>
                    </div>
                </div>
                <div class="seperator col-md-12">
                    <span class="border"></span>
                </div>
            </div>
        </div>
    </div>
    {{-- visi --}}
    <div class="popular-courses bg-gray circle carousel-shadow default-padding">
        <div class="container-full">
            <div class="row">
                <div class="col-md-5 col-sm-offset-1 content">
                    <div class="site-heading text-left">
                        <h2>Visi - Misi</h2>
                    </div>
                    <!-- item -->
                    <div class="item">
                        <div class="icon">
                            <i class="flaticon-trending"></i>
                        </div>
                        <div class="info">
                            <h4>
                                <a href="#">Visi</a>
                            </h4>
                            <p>
                                {{ $about->visi }}
                            </p>
                        </div>
                    </div>
                    <!-- item -->
                    <!-- item -->
                    <div class="item">
                        <div class="icon">
                            <i class="flaticon-books"></i>
                        </div>
                        <div class="info">
                            <h4>
                                <a href="#">Misi</a>
                            </h4>
                            {{ $about->misi }}
                        </div>
                    </div>
                    <!-- item -->
                </div>
                <div class="col-md-5 thumb bg-cover">
                    <img src="storage/{{ $about->foto_visi }}" alt="visi misi primabaca">
                    <!-- item -->
                </div>
            </div>
        </div>
    </div>

    <section id="advisor" class="advisor-area default-padding">
        <div class="container">
            <div class="site-heading text-center">
                <h2>Petugas Perpustakaan</h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="advisor-carousel owl-carousel owl-theme text-center text-light">
                        <!-- Single Item -->
                        @foreach ($petugas as $petugas)
                            <div class="advisor-item">
                                <div class="info-box">
                                    <img height="300px" src="/foto_petugas/{{ $petugas->foto }}" alt="primabaca">
                                    <div class="info-title">
                                        <h4>{{ $petugas->name }}</h4>
                                        <span>{{ $petugas->type }}</span>
                                    </div>
                                    <div class="overlay">
                                        <div class="box">
                                            <div class="content">
                                                <div class="overlay-content">
                                                    <h4>About {{ $petugas->name }}</h4>
                                                    <div class="social">
                                                        <ul>
                                                            <li>
                                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><i class="fab fa-pinterest"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><i class="fab fa-instagram"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- Single Item -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
