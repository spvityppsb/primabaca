@extends('layouts.master')

@section('content')
    <div class="text-center bg-fixed shadow breadcrumb-area dark text-light"
        style="background-image: url(/perpus/img-1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{ $artikel->judul }}</h1>
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
                                <div class="thumb">
                                    <a href="#"><img src="/foto_artikel/{{ $artikel->foto }}"
                                            alt="{{ $artikel->slug }}"></a>
                                    <div class="date">
                                        <h4><span>{{ $artikel->created_at->format('d') }}</span>
                                            {{ $artikel->created_at->format('M, Y') }}</h4>
                                    </div>
                                </div>
                                <div class="info">
                                    <h3>{{ $artikel->judul }}</h3>
                                    <div class="meta">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-user"></i> {{ $artikel->created_by }}</a>
                                            </li>
                                        </ul>
                                        <div class="share">
                                            <i class="fas fa-share-alt"></i>
                                            <ul>
                                                <li class="facebook">
                                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                                                        target="_blank"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li class="twitter">
                                                    <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ $artikel->judul }}"
                                                        target="_blank"><i class="fab fa-twitter"></i></a>
                                                </li>
                                                <li class="pinterest">
                                                    <a href="https://pinterest.com/pin/create/button/?url={{ url()->current() }}&media={{ asset('/foto_artikel/' . $artikel->foto) }}&description={{ $artikel->judul }}"
                                                        target="_blank"><i class="fab fa-pinterest"></i></a>
                                                </li>
                                                <li class="linkedin">
                                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ url()->current() }}"
                                                        target="_blank"><i class="fab fa-linkedin"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <p>{{ $artikel->deskripsi }}</p>
                                </div>

                                <!-- Post Navigation (Next & Previous) -->
                                <div class="post-pagi-area">
                                    @if ($previous)
                                        <a href="{{ route('home.detail_artikel', $previous->slug) }}"><i
                                                class="fas fa-angle-double-left"></i> Previous Post</a>
                                    @endif

                                    @if ($next)
                                        <a href="{{ route('home.detail_artikel', $next->slug) }}">Next Post <i
                                                class="fas fa-angle-double-right"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .thumb img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

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
