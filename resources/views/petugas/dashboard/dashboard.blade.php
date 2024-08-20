@extends('petugas.theme.master')

@section('content')
    <!-- Container -->
    <div class="container-fluid px-xxl-65 px-xl-20 mt-20">
        <!-- Title -->
        <div class="hk-pg-header mb-10">
            <div>
                <h4 class="hk-pg-title"><span class="pg-title-icon"><i class="ion ion-md-analytics"></i></span>Dashboard</h4>
            </div>
        </div>
        <!-- /Title -->

        <!-- Row -->
        @php
            $siswa = DB::Table('siswa')->get();
            $buku = DB::Table('buku')->get();
            $pinjam = DB::Table('riwayat_pinjam')->where('status', 'pinjam')->get();
            $kembali = DB::Table('riwayat_pinjam')->where('status', 'selesai')->get();
            $aktivity = DB::Table('riwayat_pinjam')
                ->join('siswa', 'siswa.id_siswa', '=', 'riwayat_pinjam.id_siswa')
                ->join('buku', 'buku.id_buku', '=', 'riwayat_pinjam.id_buku')
                ->select('riwayat_pinjam.*', 'siswa.nama_siswa', 'siswa.foto', 'buku.nama_buku')
                ->latest()
                ->limit(5)
                ->get();
        @endphp
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <span class="d-block font-11 font-weight-500 text-dark text-uppercase mb-10">Siswa</span>
                                <div class="d-flex align-items-end justify-content-between">
                                    <div>
                                        <span class="d-block">
                                            <span class="display-5 font-weight-400 text-dark">{{ $siswa->count() }}</span>
                                            <small>Siswa Terdaftar</small>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <span class="d-block font-11 font-weight-500 text-dark text-uppercase mb-10">Buku</span>
                                <div class="d-flex align-items-end justify-content-between">
                                    <div>
                                        <span class="d-block">
                                            <span class="display-5 font-weight-400 text-dark">{{ $buku->count() }}</span>
                                            <small>Buku Terdaftar</small>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <span class="d-block font-11 font-weight-500 text-dark text-uppercase mb-10">Pinjam</span>
                                <div class="d-flex align-items-end justify-content-between">
                                    <div>
                                        <span class="d-block">
                                            <span class="display-5 font-weight-400 text-dark">{{ $pinjam->count() }}</span>
                                            <small>Siswa Meminjam Buku</small>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <span class="d-block font-11 font-weight-500 text-dark text-uppercase mb-10">Siswa Aktif
                                    Meminjam</span>
                                <div class="d-flex align-items-end justify-content-between">
                                    <div>
                                        <span class="d-block">
                                            <span class="display-5 font-weight-400 text-dark">{{ $kembali->count() }}</span>
                                            <small>Siswa</small>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-lg">
                            <h6 class="card-header">
                                Aktifitas Terakhir
                            </h6>
                            <div class="card-body">
                                @forelse ($aktivity as  $data)
                                    <div class="user-activity">
                                        <div class="media pb-0">
                                            <div class="media-img-wrap">
                                                <div class="avatar avatar-sm">
                                                    <img src="/foto_siswa/{{ $data->foto }}" alt="user"
                                                        class="avatar-img rounded-circle">
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    <span class="d-block mb-5"><span
                                                            class="font-weight-500 text-dark text-capitalize">{{ Str::title($data->nama_siswa) }}</span>
                                                        <span class="pl-5">
                                                            @if ($data->status == 'pinjam')
                                                                Melakukan Pinjaman Buku {{ Str::upper($data->nama_buku) }}
                                                            @else
                                                                Melakukan Pengembalian Buku
                                                                {{ Str::upper($data->nama_buku) }}
                                                            @endif
                                                        </span></span>
                                                    <span
                                                        class="d-block font-13">{{ date('d-F-Y', strtotime($data->updated_at)) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header card-header-action">
                        <h6>Referral Stats</h6>
                        <div class="d-flex align-items-center card-action-wrap">
                            <a href="#" class="inline-block refresh mr-15">
                                <i class="ion ion-md-arrow-down"></i>
                            </a>
                            <a href="#" class="inline-block full-screen">
                                <i class="ion ion-md-expand"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body pa-0">
                        <div class="pa-20">
                            <div id="m_chart_1" style="height: 370px"></div>
                        </div>
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table class="table table-sm table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th class="w-25">Country</th>
                                            <th>Sessions</th>
                                            <th>Goals</th>
                                            <th>Goals Rate</th>
                                            <th>Bounce Rate</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Canada</td>
                                            <td>55,555</td>
                                            <td>210</td>
                                            <td>2.46%</td>
                                            <td>0.26%</td>
                                        </tr>
                                        <tr>
                                            <td>India</td>
                                            <td>24,152</td>
                                            <td>135</td>
                                            <td>0.58%</td>
                                            <td>0.43%</td>
                                        </tr>
                                        <tr>
                                            <td>UK</td>
                                            <td>15,640</td>
                                            <td>324</td>
                                            <td>5.15%</td>
                                            <td>2.47%</td>
                                        </tr>
                                        <tr>
                                            <td>Botswana</td>
                                            <td>12,148</td>
                                            <td>854</td>
                                            <td>4.19%</td>
                                            <td>0.1%</td>
                                        </tr>
                                        <tr>
                                            <td>UAE</td>
                                            <td>11,258</td>
                                            <td>453</td>
                                            <td>8.15%</td>
                                            <td>0.14%</td>
                                        </tr>
                                        <tr>
                                            <td>Australia</td>
                                            <td>10,786</td>
                                            <td>376</td>
                                            <td>5.48%</td>
                                            <td>0.45%</td>
                                        </tr>
                                        <tr>
                                            <td>Phillipines</td>
                                            <td>9,485</td>
                                            <td>63</td>
                                            <td>3.51%</td>
                                            <td>0.9%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Row -->
    </div>
    <!-- /Container -->
@endsection
