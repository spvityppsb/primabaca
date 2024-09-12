@extends('layouts.master')

@section('content')
    <div class="text-center bg-fixed shadow breadcrumb-area dark text-light"
        style="background-image: url(/perpus/img-1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{ $galeri->nama_media }}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Blog -->
    <div class="blog-area full-blog standard single-blog default-padding">
        <div class="container">
            <div class="row">
                <div class="blog-items">
                    <div class="blog-content col-md-10 col-md-offset-1">
                        <div class="item-box">
                            <div class="item">
                                <div>
                                    <div class="form-group col-md-12">
                                        <label for="files">{{ $galeri->judul }}</label>

                                        <div class="mb-4 main-image">
                                            <a href="{{ asset('uploads/galeri/' . $galeri->file[0]) }}" class="popup-link">
                                                <img id="mainImage" src="{{ asset('uploads/galeri/' . $galeri->file[0]) }}"
                                                    alt="{{ $galeri->slug }}" class="rounded img-fluid zoomable-image">
                                            </a>
                                        </div>

                                        <!-- Thumbnail Images -->
                                        <div class="row">
                                            @foreach ($galeri->file as $index => $file)
                                                <div class="mb-4 col-md-3">
                                                    <a href="{{ asset('uploads/galeri/' . $file) }}" class="popup-link">
                                                        <img src="{{ asset('uploads/galeri/' . $file) }}"
                                                            alt="{{ $galeri->slug }}" class="img-thumbnail img-thumb">
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>

                                <!-- Post Meta Information -->
                                <div class="date">
                                    <h4><span>{{ $galeri->created_at->format('d') }}</span>
                                        {{ $galeri->created_at->format('M, Y') }}</h4>
                                </div>
                                <div class="info">
                                    <h3>{{ $galeri->nama_media }}</h3>
                                    <div class="meta">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-user"></i> {{ $galeri->created_by }}</a>
                                            </li>
                                        </ul>

                                        <!-- Social Media Share Buttons -->
                                        <div class="share">
                                            <i class="fas fa-share-alt"></i>
                                            <ul>
                                                <li class="facebook">
                                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                                                        target="_blank"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li class="twitter">
                                                    <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ $galeri->nama_media }}"
                                                        target="_blank"><i class="fab fa-twitter"></i></a>
                                                </li>
                                                <li class="pinterest">
                                                    <a href="https://pinterest.com/pin/create/button/?url={{ url()->current() }}&media={{ asset('uploads/galeri/' . $galeri->file[0]) }}&description={{ $galeri->nama_media }}"
                                                        target="_blank"><i class="fab fa-pinterest"></i></a>
                                                </li>
                                                <li class="linkedin">
                                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ url()->current() }}"
                                                        target="_blank"><i class="fab fa-linkedin"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Gallery Description -->
                                    <p>{{ $galeri->deskripsi }}</p>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Post Navigation (Next & Previous) -->
            <div class="post-pagi-area">
                <!-- Show the Previous post link if available -->
                @if ($previous)
                    <a href="{{ route('home.detail_foto', $previous->slug) }}">
                        <i class="fas fa-angle-double-left"></i> Previous: {{ $previous->nama_media }}
                    </a>
                @else
                    <span class="disabled-link">
                        <i class="fas fa-angle-double-left"></i> No Previous Post
                    </span>
                @endif

                <!-- Show the Next post link if available -->
                @if ($next)
                    <a href="{{ route('home.detail_foto', $next->slug) }}">
                        Next: {{ $next->nama_media }} <i class="fas fa-angle-double-right"></i>
                    </a>
                @else
                    <span class="disabled-link">
                        No Next Post <i class="fas fa-angle-double-right"></i>
                    </span>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        /* Main image styling */
        .main-image img {
            width: 100%;
            height: auto;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .zoomable-image:hover {
            transform: scale(1.1);
        }

        /* Thumbnail styling */
        .img-thumb {
            width: 100%;
            height: 150px;
            /* Set height to be the same for all thumbnails */
            object-fit: cover;
            cursor: pointer;
            transition: opacity 0.3s ease;
        }

        .img-thumb:hover {
            opacity: 0.7;
        }

        /* Post pagination and share buttons styling */
        .post-pagi-area {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .post-pagi-area a {
            background-color: #f1f1f1;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            color: #333;
        }

        .post-pagi-area a:hover {
            background-color: #ddd;
        }

        .disabled-link {
            background-color: #f1f1f1;
            padding: 10px 20px;
            border-radius: 5px;
            color: #999;
        }

        .share ul {
            display: flex;
            list-style: none;
            padding-left: 0;
        }

        .share ul li {
            margin-right: 10px;
        }

        .share ul li a {
            font-size: 18px;
            color: #333;
            transition: color 0.3s ease;
        }

        .share ul li a:hover {
            color: #007bff;
        }
    </style>
@endsection

@section('scripts')
    <script>
        // Function to change the main image when a thumbnail is clicked
        function changeMainImage(imageUrl) {
            document.getElementById('mainImage').src = imageUrl;

            // Add zoom effect only to the main image when it's changed
            const mainImage = document.getElementById('mainImage');
            mainImage.classList.add('zoomable-image');
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize Magnific Popup for the images
            $('.popup-link').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true // Enable gallery mode to navigate between images
                }
            });

            // Function to change the main image when a thumbnail is clicked
            function changeMainImage(imageUrl) {
                document.getElementById('mainImage').src = imageUrl;

                // Add zoom effect only to the main image when it's changed
                const mainImage = document.getElementById('mainImage');
                mainImage.classList.add('zoomable-image');
            }
        });
    </script>
@endsection
