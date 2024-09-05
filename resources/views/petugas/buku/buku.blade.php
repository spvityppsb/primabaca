@extends('petugas.theme.master')

@section('content')
    <div class="container-fluid px-xxl-65 px-xl-20 mt-20">
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><i class="fa fa-book"></i></span>Buku</h4>
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
                <a href="{{ route('buku.create') }}" class="btn btn-primary btn-wth-icon btn-sm mb-20">
                    <span class="icon-label">
                        <span class="material-icons">
                            create_new_folder
                        </span>
                    </span>
                    <span class="btn-text">Tambah Buku Baru</span>
                </a>
                <button class="btn btn-light btn-wth-icon btn-sm mb-20" data-toggle="modal" data-target="#importExcel"><span
                        class="icon-label">
                        <span class="material-icons">
                            file_upload
                        </span>
                    </span>
                    <span class="btn-text">Import Excel</span>
                </button>
                <a href="{{ route('laporan.buku_excel') }}" class="btn btn-link btn-wth-icon btn-sm mb-20">
                    <span class="icon-label">
                        <span class="material-icons">
                            file_download
                        </span>
                    </span>
                    <span class="btn-text">Export Excel</span>
                </a>
                <a href="" class="btn btn-link btn-wth-icon btn-sm mb-20">
                    <span class="icon-label">
                        <span class="material-icons">
                            file_download
                        </span>
                    </span>
                    <span class="btn-text">PDF</span>
                </a>
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Data Buku</h5>
                    <p class="mb-20">Data Buku Yang Terdaftar Di Perpustakaan dan Dapat Di Pinjam Anggota Primabaca YPPSB
                    </p>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <table id="datable_1" class="table table-hover w-100 display pb-30"
                                    style="overflow-x:auto;">
                                    <thead>
                                        <tr>
                                            <th>Kode Buku</th>
                                            <th>Judul Buku</th>
                                            <th>Penerbit Buku</th>
                                            <th>Penulis Buku</th>
                                            <th>No. ISBN Buku</th>
                                            <th>Tahun Terbit Buku</th>
                                            <th>Rak Buku</th>
                                            <th>Stok Buku</th>
                                            <th>Foto Buku</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($buku as $data)
                                            <tr>
                                                <td class="text-center">{!! DNS1D::getBarcodeHTML($data->kode_buku, 'C39') !!}
                                                    <br>
                                                    <p class="text-center">{{ $data->kode_buku }}</p>
                                                </td>
                                                <td>{{ Str::title($data->nama_buku) }}
                                                </td>
                                                <td>{{ Str::upper($data->penerbit) }}</td>
                                                <td>{{ Str::title($data->penulis) }}</td>
                                                <td>{{ Str::upper($data->isbn) }}</td>
                                                <td>
                                                    <span
                                                        class="badge badge-primary">{{ Str::title($data->tahun_terbit) }}</span>
                                                </td>
                                                <td>{{ Str::title($data->jenis_rak) }}</td>
                                                <td>
                                                    @if ($data->stok_buku < 1)
                                                        <span class="badge badge-danger">Stok Buku Habis</span>
                                                    @else
                                                        <span class="badge badge-success">Sisa Stok :
                                                            {{ $data->stok_buku }}</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($data->foto_buku == null)
                                                        <img height="60" width="60" src="/perpus/no-image.jpg"
                                                            alt="Thumb">
                                                    @else
                                                        <img src="/foto_buku/{{ $data->foto_buku }}" height="60"
                                                            width="60" alt="">
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('buku.edit', $data->id_buku) }}"
                                                        class="btn btn-icon btn-icon-circle btn-blue btn-icon-style-3"
                                                        data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <span class="btn-icon-wrap">
                                                            <span class="material-icons">
                                                                edit
                                                            </span>
                                                        </span>
                                                    </a>
                                                    <a href="{{ route('buku.destroy', $data->id_buku) }}"
                                                        class="btn btn-icon btn-icon-circle btn-blue btn-icon-style-3"
                                                        data-toggle="tooltip" data-placement="top" title="Hapus"
                                                        onclick="confirmDelete(event, 'buku-delete-form-{{ $data->id_buku }}')">
                                                        <span class="btn-icon-wrap">
                                                            <span class="material-icons">
                                                                delete
                                                            </span>
                                                        </span>
                                                    </a>
                                                    <form id="buku-delete-form-{{ $data->id_buku }}"
                                                        action="{{ route('buku.destroy', $data->id_buku) }}" method="POST"
                                                        class="d-none">
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
    <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{ route('laporan.import_buku_excel') }}" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                    </div>
                    <div class="modal-body">

                        {{ csrf_field() }}

                        <label>Pilih file excel</label>
                        <div class="form-group">
                            <input type="file" name="file" required="required">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </div>
            </form>
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
    <script>
        function confirmDelete(event, formId) {
            event.preventDefault(); // Menghentikan pengiriman form sementara
            var confirmAction = confirm("Apakah Anda yakin ingin menghapus buku ini?");
            if (confirmAction) {
                document.getElementById(formId).submit(); // Melanjutkan penghapusan jika pengguna mengonfirmasi
            }
        }
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
