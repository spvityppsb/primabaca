@extends('layouts.master')

@section('content')
    <div class="text-center bg-fixed shadow breadcrumb-area dark text-light"
        style="background-image: url(/perpus/img-1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Galeri Foto</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Gallery -->
    <div class="gallery-area default-padding">
        <div class="container">
            <div class="row">
                @if ($videoPertama->isEmpty())
                    <!-- Your no data result image here -->
                @else
                    @foreach ($videoPertama as $data)
                        @if ($data->first_file)
                            <div class="mb-4 col-md-6">
                                <div class="single-item">
                                    <div class="thumb">
                                        <a href="#">
                                            <video width="100%" controls>
                                                <source src="/uploads/galeri/{{ $data->first_file }}" type="video/mp4"
                                                    alt="{{ $data->slug }}">
                                                Your browser does not support the video tag.
                                            </video>
                                        </a>
                                        <div class="date">
                                            <h4>{{ $data->created_at->format('d M Y') }}</h4>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <h3>
                                            <a href="#">{{ $data->nama_media }}</a>
                                        </h3>
                                        <a href="#">Lihat Detail <i class="fas fa-angle-double-right"></i></a>
                                        <div class="meta">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- End Gallery -->
@endsection

@section('css')
    <style>
        .thumb video {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .single-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            transition: box-shadow 0.3s;
        }

        .single-item:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .info {
            padding: 15px;
        }

        .date h4 {
            font-size: 14px;
            color: #999;
        }

        .info h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .info a {
            color: #007bff;
            text-decoration: none;
        }

        .info a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .single-item {
                margin-bottom: 20px;
            }
        }
    </style>
@endsection
