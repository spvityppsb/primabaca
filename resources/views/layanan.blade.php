@extends('layouts.master')

@section('content')
    <div class="breadcrumb-area shadow dark text-center bg-fixed text-light"
        style="background-image: url(/perpus/img-1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Layanan Kami</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="popular-courses default-padding bottom-less without-carousel">
        <div class="container">
            <div class="row">
                <div class="our-features">
                    @foreach ($layanan as $layanan)
                        <div class="col-md-3 col-sm-4 mb-3">
                            <div class="item mariner">
                                <div class="icon mb-3">
                                    <img height="200px" width="200px" src="/storage/{{ $layanan->foto }}"
                                        class="d-block w-100" alt="{{ $layanan->slug }}">
                                </div>
                                <br>
                                <div class="info">
                                    <h4>{{ $layanan->judul }}</h4>
                                    <a href="{{ $layanan->url }}"
                                        target="blank">{{ Str::limit($layanan->keterangan, 30) }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
