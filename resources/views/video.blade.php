@extends('layouts.master')

@section('content')
    <div class="text-center bg-fixed shadow breadcrumb-area dark text-light"
        style="background-image: url(/perpus/img-1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Galeri Video</h1>
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
                            <div class="mb-4 col-md-6"> <!-- Added col-md-6 for 2-column layout -->
                                <div class="single-item">
                                    <div class="thumb">
                                        <h3>
                                            <a
                                                href="{{ route('home.detail_foto', $data->slug) }}">{{ $data->nama_media }}</a>
                                        </h3>
                                        <a href="/uploads/galeri/{{ $data->first_file }}" class="popup-video">
                                            <video width="100%" controls>
                                                <source src="/uploads/galeri/{{ $data->first_file }}" type="video/mp4"
                                                    alt="{{ $data->slug }}">
                                                Your browser does not support the video tag.
                                            </video>
                                        </a>
                                    </div>
                                    <div class="info">
                                        <div class="date">
                                            <h5>{{ $data->created_at->format('d M Y') }}</h5>
                                        </div>
                                        <div class="meta">
                                        </div>
                                        <p class="mb-5"> </p>
                                    </div>
                                    <br>
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
        /* Grid column styling for a 2-column layout */
        .col-md-6 {
            width: 50%;
            margin-bottom: 40px;
            /* Add spacing between rows */
        }

        .single-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            transition: box-shadow 0.3s;
            margin-bottom: 40px;
            /* Ensure enough space between items */
        }

        .single-item:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .thumb video {
            width: 100%;
            height: auto;
            object-fit: cover;
            margin-bottom: 15px;
            /* Add spacing between video and title */
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

        hr {
            margin: 20px 0;
        }

        /* Responsive Spacing */
        @media (max-width: 768px) {
            .col-md-6 {
                width: 100%;
            }

            .single-item {
                margin-bottom: 25px;
            }
        }
    </style>
@endsection

@section('scripts')
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">

    <!-- Magnific Popup JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize Magnific Popup for video popups
            $('.popup-video').magnificPopup({
                type: 'iframe',
                gallery: {
                    enabled: true // Enables gallery mode
                },
                iframe: {
                    patterns: {
                        mp4: {
                            index: '.mp4',
                            id: null,
                            src: '%id%'
                        }
                    }
                }
            });
        });
    </script>
@endsection
