@extends('layouts.master')

@section('content')
    <div class="breadcrumb-area shadow dark text-center bg-fixed text-light"
        style="background-image: url(/perpus/img-1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Buku</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="popular-courses default-padding bottom-less without-carousel">
        <div class="container">
            <div class="row">
                <div class="popular-courses-items bottom-price">
                    @foreach ($buku as $data)
                        <div class="col-md-3 col-sm-3 equal-height">
                            <div class="advisor-item">
                                <div class="info-box">
                                    <a href="{{ route('home.detail_buku', $data->id_buku) }}">
                                        @if ($data->foto_buku == null)
                                            <img width="100px" height="300px" src="/perpus/no-image.jpg" alt="Thumb">
                                        @else
                                            <img width="100px" height="300px" src="/foto_buku/{{ $data->foto_buku }}"
                                                alt="Thumb">
                                        @endif
                                        <div class="info-title">
                                            <h4>{{ Str::title($data->nama_buku) }}</h4>
                                            <span>{{ Str::upper($data->jenis_rak) }}</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
