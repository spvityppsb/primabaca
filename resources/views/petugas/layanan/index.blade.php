@extends('petugas.theme.master')

@section('content')
    <div class="container-fluid px-xxl-65 px-xl-20 mt-20">
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon">
                    <i class="material-icons">info</i></span>Layanan Perpustakaan</h4>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-wth-icon fade show" role="alert">
                <span class="alert-icon-wrap"><i class="zmdi zmdi-check-circle"></i></span>
                {{ session('success') }}
            </div>
        @elseif (session('fail'))
            <div class="alert alert-danger alert-wth-icon fade show" role="alert">
                <span class="alert-icon-wrap"><i class="zmdi zmdi-block"></i></span>
                {{ session('fail') }}
            </div>
        @endif

        <div class="row">
            <div class="col-xl-12">
                <a href="{{ route('layanan.create') }}" class="btn btn-primary btn-wth-icon btn-sm mb-20">
                    <span class="icon-label">
                        <span class="material-icons">
                            create_new_folder
                        </span>
                    </span>
                    <span class="btn-text">Tambah Layanan Perpustakaan Baru</span>
                </a>
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Data Layanan Perpustakaan</h5>
                    </p>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <table id="datable_1" class="table table-hover w-100 display pb-30">
                                    <thead>
                                        <tr>
                                            <th>Judul Layanan Perpustakaan</th>
                                            <th>Keterangan Layanan Perpustakaan</th>
                                            <th>Slug Layanan Perpustakaan</th>
                                            <th>Link Layanan Perpustakaan</th>
                                            <th>Foto Layanan Perpustakaan</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($layanan as $data)
                                            <tr>
                                                <td>{{ Str::title($data->judul) }}</td>
                                                <td>{{ Str::title($data->keterangan) }}</td>
                                                <td>{{ Str::title($data->slug) }}</td>
                                                <td><a href="{{ $data->url }}" target="blank">{{ $data->url }}</a>
                                                </td>
                                                <td><img src="/storage/{{ $data->foto }}" width="20%" height="20%">
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('layanan.edit', $data->id_layanan) }}"
                                                        class="btn btn-icon btn-icon-circle btn-blue btn-icon-style-3"
                                                        data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <span class="btn-icon-wrap">
                                                            <span class="material-icons">
                                                                edit
                                                            </span>
                                                        </span>
                                                    </a>
                                                    <a href="{{ route('layanan.destroy', $data->id_layanan) }}"
                                                        class="btn btn-icon btn-icon-circle btn-blue btn-icon-style-3"
                                                        data-toggle="tooltip" data-placement="top" title="Hapus"
                                                        onclick="event.preventDefault();
                                                        document.getElementById('layanan-delete-form-{{ $data->id_layanan }}').submit();">
                                                        <span class="btn-icon-wrap">
                                                            <span class="material-icons">
                                                                delete
                                                            </span>
                                                        </span>
                                                    </a>
                                                    <form id="layanan-delete-form-{{ $data->id_layanan }}"
                                                        action="{{ route('layanan.destroy', $data->id_layanan) }}"
                                                        method="POST" class="d-none">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <!-- Data Table CSS -->
    <link href="/theme/vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="/theme/vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet"
        type="text/css" />
@endsection

@section('js')
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(700, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2500);
    </script>
    <!-- Data Table JavaScript -->
    <script src="/theme/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/theme/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/theme/vendors/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
    <script src="/theme/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/theme/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="/theme/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="/theme/vendors/jszip/dist/jszip.min.js"></script>
    <script src="/theme/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="/theme/vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="/theme/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/theme/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/theme/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/theme/dist/js/dataTables-data.js"></script>
@endsection
