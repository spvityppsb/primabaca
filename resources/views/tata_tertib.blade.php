@extends('layouts.master')

@section('content')
    <div class="breadcrumb-area shadow dark text-center bg-fixed text-light"
        style="background-image: url(/perpus/img-1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Tata Tertib Peminjaman</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="faq-area left-sidebar course-details-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 faq-content">
                    <!-- Start Accordion -->
                    <div class="acd-items acd-arrow">
                        <div class="panel-group symb" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac1">
                                            Tata Tertib Peminjaman Buku
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <p>
                                            Tata Terbit Dalam Melakukan Transaksi Peminjaman Buku di Primabaca YPPSB
                                            yang harus Di Patuhi Oleh Seluruh Pengunjung
                                        </p>
                                        <ul>
                                            @foreach ($rule_peminjaman as $data)
                                                <li>{{ $data->keterangan }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac2">
                                            Tata Tertib Pengembalian / Mengembalikan Buku
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                            Tata Tertib bagi Pengunjung dalam proses Pengembalian
                                            Buku di Primabaca YPPSB
                                            yang harus Di Patuhi Oleh Seluruh Pengunjung
                                        </p>
                                        <ul>
                                            @foreach ($rule_pengembalian as $data)
                                                <li>{{ $data->keterangan }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac3">
                                            Tata Tertib Pendaftaraan Angoota Perpustakaan
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac3" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                            Tata Tertib Siswa Dalam Melakukan Pendaftaraan sebagai Anggota Perpustakaan di
                                            Primabaca YPPSB
                                        </p>
                                        <ul>
                                            <li>Siswa YPPSB </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Accordion -->
                </div>
            </div>
        </div>
    </div>
@endsection
