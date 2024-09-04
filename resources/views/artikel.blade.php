@extends('layouts.master')

@section('content')
    <div class="breadcrumb-area shadow dark text-center bg-fixed text-light"
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

    <!-- Start Blog
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ============================================= -->
    <div class="blog-area full-blog standard full-blog default-padding">
        <div class="container">
            <div class="row">
                <div class="blog-items">
                    <div class="blog-content col-md-10 col-md-offset-1">
                        <!-- Single Item -->
                        @foreach ($artikel as $data)
                            <div class="single-item">
                                <div class="item">
                                    <div class="thumb">
                                        <a href="#"><img width="1500px" height="700px"
                                                src="/foto_artikel/{{ $data->foto }}" alt="{{ $data->judul }}"></a>
                                        <div class="date">
                                            <h4>{{ $data->created_at }}</h4>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <h3>
                                            <a href="#">{{ $data->judul }}</a>
                                        </h3>
                                        <p>{{ Str::limit($data->deskripsi, 200) }}
                                        </p>
                                        <a href="#">Read More <i class="fas fa-angle-double-right"></i></a>
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
                        <!-- Pagination -->
                        <div class="row">
                            <div class="col-md-10">
                                <nav aria-label="navigation">
                                    <ul class="pagination">
                                        Showing {{ $artikel->count() }} From {{ $artikel->total() }}
                                    </ul>
                                </nav>
                            </div>
                            <div class="col-md-2 float-left">
                                {{ $artikel->links() }}
                            </div>
                        </div>
                    </div>
                    <!-- End Blog Content -->
                </div>
            </div>
        </div>
    </div>
@endsection
