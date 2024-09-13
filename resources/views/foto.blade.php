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
                @if ($galeri->isEmpty())
                    <div class="text-center col-md-12"
                        style="display: flex; justify-content: center; align-items: center; height: 50vh;">
                        <img src="https://i.imgur.com/qIufhof.png" alt="No data result image" class="img-fluid">
                    </div>
                @else
                    @foreach ($galeri as $data)
                        @if ($data->first_file)
                            <div class="mb-4 col-md-4">
                                <div class="single-item">
                                    <div class="thumb">
                                        <a href="{{ route('home.detail_foto', $data->slug) }}">
                                            <img src="/uploads/galeri/{{ $data->first_file }}" alt="{{ $data->slug }}"
                                                class="mb-4 img-fluid">
                                        </a>
                                        <br>
                                        <br>
                                        <h3>
                                            <a
                                                href="{{ route('home.detail_foto', $data->slug) }}">{{ $data->nama_media }}</a>
                                        </h3>
                                    </div>
                                    <div class="info">
                                        <div class="date">
                                            <h5>{{ $data->created_at->format('d M Y') }}</h5>
                                        </div>
                                        <a href="{{ route('home.detail_foto', $data->slug) }}">Lihat Detail <i
                                                class="fas fa-angle-double-right"></i></a>
                                        <div class="meta">
                                        </div>
                                        <br>
                                        <hr>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    <!-- Pagination -->
                    <div class="col-md-12">
                        <nav aria-label="navigation">
                            {{ $galeri->links() }}
                        </nav>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- End Gallery -->
@endsection

@section('css')
    <style>
        .thumb img {
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
