@extends('layouts.master')

@section('content')
    <div class="text-center bg-fixed shadow breadcrumb-area dark text-light"
        style="background-image: url(/perpus/img-1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Artikel Primabaca</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Blog -->
    <div class="blog-area full-blog standard default-padding">
        <div class="container">
            <div class="row">
                <div class="blog-items">
                    @if ($artikel->count() == 0)
                        <div class="row">
                            <div class="col-md-12"
                                style="display: flex; justify-content: center; align-items: center; height: 50vh;">
                                <img src="https://i.imgur.com/qIufhof.png" alt="No data result image">
                            </div>
                        </div>
                    @else
                        <div class="blog-content col-md-10 col-md-offset-1">
                            <!-- Single Item -->
                            @foreach ($artikel as $data)
                                <div class="single-item">
                                    <div class="item">
                                        <div class="thumb">
                                            <a href="{{ route('home.detail_artikel', $data->slug) }}">
                                                <img src="/foto_artikel/{{ $data->foto }}" alt="{{ $data->slug }}">
                                            </a>
                                            <div class="date">
                                                <h4>{{ $data->created_at }}</h4>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <h3>
                                                <a
                                                    href="{{ route('home.detail_artikel', $data->slug) }}">{{ $data->judul }}</a>
                                            </h3>
                                            <p>{{ Str::limit($data->deskripsi, 200) }}</p>
                                            <a href="{{ route('home.detail_artikel', $data->slug) }}">Read More <i
                                                    class="fas fa-angle-double-right"></i></a>
                                            <div class="meta">
                                                <ul>
                                                    <li>
                                                        <a href="#"><i class="fas fa-user"></i>
                                                            {{ $data->created_by }}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- Single Item -->
                            <div class="row">
                                <div class="col-md-12">
                                    <nav aria-label="navigation">
                                        <ul class="pagination"> {{ $artikel->links() }}
                                            Showing {{ $artikel->count() }} From {{ $artikel->total() }}
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <!-- Pagination -->
                        </div>
                        <!-- End Blog Content -->
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    /* Membuat gambar responsive sesuai container */
    .thumb img {
        width: 100%;
        /* Pastikan gambar menggunakan 100% lebar dari kontainernya */
        height: auto;
        /* Menjaga rasio aspek gambar */
        object-fit: cover;
        /* Memastikan gambar tetap terpotong dengan baik */
    }

    /* Mobile view: ketika layar lebih kecil dari 768px */
    @media (max-width: 768px) {
        .thumb img {
            width: 100%;
            /* Pastikan gambar tetap full width */
            height: auto;
            /* Menjaga rasio pada tampilan mobile */
        }

        .single-item {
            padding: 10px;
            /* Kurangi padding untuk tampilan mobile */
        }

        .blog-content {
            margin: 0 auto;
            /* Pusatkan konten pada mobile */
        }
    }
</style>
