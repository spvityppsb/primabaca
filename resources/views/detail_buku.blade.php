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
    <!-- End Breadcrumb -->

    <!-- Start Advisor Details
                                                                                                                        ============================================= -->
    <div class="adviros-details-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-5 thumb">
                    @if ($buku->foto_buku == null)
                        <img src="/perpus/no-image.jpg" alt="Thumb">
                    @else
                        <img src="/foto_buku/{{ $buku->foto_buku }}" alt="Thumb">
                    @endif
                    <div class="desc">
                        <h4>{{ $buku->nama_buku }}</h4>
                        <span>{{ $buku->penulis }}</span>
                    </div>
                </div>
                <div class="col-md-7 info main-content">
                    <!-- Star Tab Info -->
                    <div class="tab-info">
                        <!-- Tab Nav -->
                        <ul class="nav nav-pills">
                            <li class="active">
                                <a data-toggle="tab" href="#tab1" aria-expanded="true">
                                    Info Buku
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab2" aria-expanded="false">
                                    Status Buku
                                </a>
                            </li>
                        </ul>
                        <!-- End Tab Nav -->
                        <!-- Start Tab Content -->
                        <div class="tab-content tab-content-info">
                            <!-- Single Tab -->
                            <div id="tab1" class="tab-pane fade active in">
                                <div class="info title">
                                    <ul>
                                        <li>
                                            Kode Buku <span>{{ $buku->kode_buku }}</span>
                                        </li>
                                        <li>
                                            Nama Buku <span>{{ $buku->nama_buku }}</span>
                                        </li>
                                        <li>
                                            Penulis <span>{{ $buku->penulis }}</span>
                                        </li>
                                        <li>
                                            Penerbit <span>{{ $buku->penerbit }}</span>
                                        </li>
                                        <li>
                                            Tahun Terbit <span>{{ $buku->tahun_terbit }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Single Tab -->

                            <!-- Single Tab -->
                            <div id="tab2" class="tab-pane fade">
                                <div class="info title">

                                    <div class="info title">
                                        <ul>
                                            <li>
                                                Rak Buku <span>{{ $buku->rak }}</span>
                                            </li>
                                            <li>
                                                @if ($buku->stok_buku < 1)
                                                    Ketersediaan Buku <span class="badge badge-danger">Buku sedang
                                                        dipinjam</span>
                                                @else
                                                    Ketersediaan Buku <span class="badge badge-success">Buku Tersedia
                                                        diperpustakaan</span>
                                                @endif
                                            </li>
                                            <li>
                                                No. ISBN <span>{{ $buku->isbn }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Tab -->
                        </div>
                        <!-- End Tab Content -->
                    </div>
                    <!-- End Tab Info -->
                </div>
            </div>
        </div>
    </div>
@endsection
