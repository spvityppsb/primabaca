@extends('layouts.master')

@section('content')
    <div class="content-top-heading text-light text-center less-paragraph text-normal">
        <!-- Wrapper for slides -->
        <div class="slider img-fluid">
            @foreach ($banner as $slider)
                <div class="carousel-item">
                    <img src="/storage/{{ $slider->foto }}" class="d-block w-100"
                        alt="{{ $slider->slug }}" style="object-fit:contain; object-position: right;max-width:100%; height:auto;">
                </div>
            @endforeach
            <a class="left carousel-control" href="#bootcarousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#bootcarousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="seperator col-md-12">
        <span class="border"></span>
    </div>
    <div id="top-categories" class="top-cat-area default-padding">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Layanan Kami</h2>
                        <p>
                            Layanan Perpustakaan Primabaca YPPSB.
                        </p>
                    </div>
                </div>
            </div
            <div class="row">
                <div class="top-cat-items">
                    @foreach ($layanan as $layanan)
                        <div class="col-md-4 col-sm-6 equal-height">
                            <div class="item" style="background-image: url('/storage/{{ $layanan->foto }}');">
                                <a href="#">
                                    <div class="info">
                                        <h4>{{ $layanan->judul }}</h4>
                                        <span>{{ Str::limit($layanan->keterangan, 30) }}</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div>
            <div class="col text-center">
                <a class="btn btn-primary" href="{{ route('home.layanan') }}">Lihat Semua</a>
            </div>
        </div>
    </div>
    <div class="seperator col-md-12">
        <span class="border"></span>
    </div>
    <div class="popular-courses default-padding bottom-less without-carousel">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Koleksi Terbaru</h2>
                        <p>
                            Kumpulan Terbaru.
                        </p>
                    </div>
                </div>
            </div>
            <div class="popular-courses-items bottom-price">
                @foreach ($buku as $data)
                    <div class="col-md-3 col-sm-3 equal-height" style="margin-bottom: 30px">
                        <div class="advisor-item">
                            <div class="info-box">
                                @if ($data->foto_buku == null)
                                    <img width="100px" height="300px" src="/perpus/no-image.jpg" alt="Thumb">
                                @else
                                    <img width="100px" height="300px" src="/foto_buku/{{ $data->foto_buku }}"
                                        alt="Thumb" style="object-fit:contain; object-position: center;min-width:100%; max-height:100%;">
                                @endif
                                <div class="info-title">
                                    <h4>{{ Str::title($data->nama_buku) }}</h4>
                                    <span>{{ Str::upper($data->jenis_rak) }}</span>
                                    <br>
                                    <span>Rilis : {{ $data->created_at->format('d-m-Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div>
            <div class="col text-center">
                <a class="btn btn-primary" href="{{ route('home.buku_baru') }}">Lihat Semua</a>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="/dashboard/assets/js/slick.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.slider').slick({
                autoplay: true,
                autoplaySpeed: 2500,
            });
        });
    </script>
@endsection
