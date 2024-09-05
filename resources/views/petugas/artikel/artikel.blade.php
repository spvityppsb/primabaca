@extends('petugas.theme.master')

@section('content')
    <div class="container-fluid px-xxl-65 px-xl-20 mt-20">
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><i class="fa fa-newspaper-o"></i></span>Artikel</h4>
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
                <a href="{{ route('artikel.create') }}" class="btn btn-primary btn-wth-icon btn-sm mb-20">
                    <span class="icon-label">
                        <span class="material-icons">
                            create_new_folder
                        </span>
                    </span>
                    <span class="btn-text">Tambah Artikel Baru</span>
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
                    <h5 class="hk-sec-title">Data Artikel</h5>
                    <p class="mb-20">Data Artikel Yang Terdaftar Di Perpustakaan Primabaca
                        YPPSB
                    </p>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <table id="datable_1" class="table table-hover w-100 display pb-30"
                                    style="overflow-x:auto;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Slug</th>
                                            <th>Deskripsi</th>
                                            <th>Penulis</th>
                                            <th>Rilis</th>
                                            <th>Foto</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($article as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->judul }}</td>
                                                <td>{{ $data->slug }}</td>
                                                <td>{{ $data->deskripsi }}</td>
                                                <td>{{ Str::upper($data->created_by) }}</td>
                                                <td>
                                                    <span
                                                        class="badge badge-primary">{{ Str::title($data->created_at) }}</span>
                                                </td>
                                                <td class="text-center">
                                                    @if ($data->foto == null)
                                                        <img height="60" width="60" src="/perpus/no-image.jpg"
                                                            alt="Thumb">
                                                    @else
                                                        <img src="/foto_artikel/{{ $data->foto }}" height="60"
                                                            width="60" alt="{{ $data->slug }}">
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <!-- Tombol Edit -->
                                                    <a href="{{ route('artikel.edit', $data->slug) }}"
                                                        class="btn btn-icon btn-icon-circle btn-blue btn-icon-style-3"
                                                        data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <span class="btn-icon-wrap">
                                                            <span class="material-icons">edit</span>
                                                        </span>
                                                    </a>

                                                    <!-- Tombol Hapus dengan Konfirmasi -->
                                                    <a href="#"
                                                        class="btn btn-icon btn-icon-circle btn-blue btn-icon-style-3"
                                                        data-toggle="tooltip" data-placement="top" title="Hapus"
                                                        onclick="confirmDelete({{ $data->id_artikel }})">
                                                        <span class="btn-icon-wrap">
                                                            <span class="material-icons">delete</span>
                                                        </span>
                                                    </a>

                                                    <!-- Form untuk menghapus artikel -->
                                                    <form id="artikel-delete-form-{{ $data->id_artikel }}"
                                                        action="{{ route('artikel.destroy', $data->id_artikel) }}"
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

    <script type="text/javascript">
        function confirmDelete(id) {
            // Tampilkan dialog konfirmasi
            let confirmation = confirm('Apakah Anda yakin ingin menghapus artikel ini?');

            // Jika pengguna memilih OK, submit form
            if (confirmation) {
                document.getElementById('artikel-delete-form-' + id).submit();
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
