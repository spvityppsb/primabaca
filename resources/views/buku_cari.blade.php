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

    <div class="faq-area left-sidebar course-details-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 faq-content">
                    <!-- Start Accordion -->
                    <div class="row">
                        <div class="popular-courses-items bottom-price">
                            @forelse ($buku as $data)
                                <div class="col-md-6 col-sm-4 equal-height">
                                    <a href="{{ route('home.detail_buku', $data->id_buku) }}">
                                        <div class="advisor-item">
                                            <div class="info-box">
                                                @if ($data->foto_buku == null)
                                                    <img width="100px" height="300px" src="/perpus/no-image.jpg" alt="Thumb">
                                                @else
                                                    <img width="100px" height="300px" src="/foto_buku/{{ $data->foto_buku }}" alt="Thumb" style="object-fit:contain; object-position: center;min-width:100%; max-height:100%;">
                                                @endif
                                                <div class="info-title">
                                                    <h4>{{ Str::title($data->nama_buku) }}</h4>
                                                    <span>{{ Str::upper($data->jenis_rak) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @empty
                                <div class="alert alert-danger">Maaf Buku Dengan Judul Pencarian Tidak Tersedia</div>
                            @endforelse
                        </div>
                    </div>
                    <!-- End Accordion -->
                </div>
                <!-- Start Sidebar -->
                <div class="left-sidebar col-md-4">
                    <div class="sidebar">
                        <aside>
                            <!-- Sidebar Item -->
                            <div class="sidebar-item search">
                                <div class="sidebar-info">
                                    <form action="{{ route('home.cari') }}" method="get">
                                        @csrf
                                        <input type="text" name="buku" placeholder="Cari Buku" class="form-control">
                                        <input type="submit" value="search">
                                    </form>
                                </div>
                            </div>
                            <!-- End Sidebar Item -->
                            <!-- Sidebar Item -->
                            <div class="sidebar-item recent-post">
                                <div class="title">
                                    <h4>Buku Rekomendasi Untuk Di Baca</h4>
                                </div>
                                @foreach ($random as $buku)
                                    <div class="item">
                                        <div class="content">
                                            <div class="thumb">
                                                <a href="{{ route('home.detail_buku', $buku->id_buku) }}">
                                                    @if ($buku->foto_buku == null)
                                                        <img src="/perpus/no-image.jpg" alt="Thumb">
                                                    @else
                                                        <img src="/foto_buku/{{ $buku->foto_buku }}" alt="Thumb" style="object-fit:contain; object-position: center;min-width:100%; max-height:100%;">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="info">
                                                <h4>
                                                    <a
                                                        href="{{ route('home.detail_buku', $buku->id_buku) }}">{{ Str::title($buku->nama_buku) }}</a>
                                                </h4>
                                                <div class="meta">
                                                    <i class="fas fa-dolly"></i><a
                                                        href="{{ route('home.detail_buku', $buku->id_buku) }}">{{ Str::upper($buku->jenis_rak) }}</a><br>
                                                    <i class="fas fa-dolly"></i>Penerbit : <a
                                                        href="{{ route('home.detail_buku', $buku->id_buku) }}">{{ Str::upper($buku->penerbit) }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- End Sidebar Item -->

                        </aside>
                    </div>
                </div>
                <!-- End Sidebar -->
            </div>
        </div>
    </div>
@endsection
