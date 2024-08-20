@extends('petugas.theme.master')

@section('content')
    <div class="container-fluid px-xxl-65 px-xl-20 mt-20">
        <div class="hk-pg-header">
            <a href="javascript:window.print()" class="btn btn-danger btn-sm noPrint"><i class="fa fa-print"></i> Cetak
                Kartu</a>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="col-6" style="font-size:12;" style="width: 8.5cm;" style="height: 5.5cm">
                    <div class="card text-white border-danger">
                        <div class="card-header bg-danger">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="/storage/{{ $tentang_kami->foto }}" height="90" width="90"
                                        alt="">
                                </div>
                                <div class="col-9">
                                    <h6 class="text-right" style="color: white">Kartu Anggota Perpustakaan</h6>
                                    <h6 class="text-right mt-5" style="color: white">Perpustakaan Primabaca YPPSB</h6>
                                    <p class="text-right mt-5">{{ $tentang_kami->alamat }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body bg-white" style="color:black">
                            <div class="row">
                                <div class="col-3">
                                    @if ($siswa->foto == null)
                                        <img src="/perpus/default.jpg" height="100" width="100" alt="">
                                    @else
                                        <img src="/foto_siswa/{{ $siswa->foto }}" height="100" width="100"
                                            alt="">
                                    @endif
                                    <p class="text-left">{{ Str::upper($siswa->nis) }}</p>
                                </div>
                                <div class="col-7">
                                    <table border="0">
                                        <thead>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="padding: 3px"><b>Nama Lengkap</b></td>
                                                <td><b>&nbsp;: </b></td>
                                                <td>
                                                    &nbsp;{{ Str::upper($siswa->nama_siswa) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 3px"><b>Jenis Kelamin</b></td>
                                                <td><b>&nbsp;: </b></td>
                                                <td>
                                                    @if ($siswa->jenis_kelamin == 'l')
                                                        &nbsp;Laki - Laki
                                                    @else
                                                        &nbsp;Perempuan
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 3px"><b>No. Telpon</b></td>
                                                <td><b>&nbsp;: </b></td>
                                                <td>
                                                    &nbsp;{{ Str::upper($siswa->telp) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 3px"><b>Tipe Anggota</b></td>
                                                <td><b>&nbsp;: </b></td>
                                                <td>
                                                    &nbsp;{{ Str::upper($siswa->jenis_kelas) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 3px"><b>Instansi</b></td>
                                                <td><b>&nbsp;: </b></td>
                                                <td>
                                                    &nbsp;{{ Str::upper($siswa->instansi) }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row justify-content-center mt-2">
                                <div class="col-auto align-self-center">
                                    <span>
                                        {!! DNS1D::getBarcodeHTML($siswa->barcode, 'C39') !!} <br>
                                    </span>
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
@endsection
