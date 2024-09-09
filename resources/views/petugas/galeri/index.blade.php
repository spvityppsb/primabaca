@extends('petugas.theme.master')

@section('content')
    <div class="mt-20 container-fluid px-xxl-65 px-xl-20">
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><i class="fa fa-video-camera"></i></span>Galery</h4>
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
                <a href="{{ route('galeri.create') }}" class="mb-20 btn btn-primary btn-wth-icon btn-sm">
                    <span class="icon-label">
                        <span class="material-icons">
                            create_new_folder
                        </span>
                    </span>
                    <span class="btn-text">Tambah Galeri Baru</span>
                </a>
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Data Galeri</h5>
                    <p class="mb-20">Data Galeri Yang Terdaftar Di Perpustakaan Primabaca
                        YPPSB
                    </p>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Media</th>
                                            <th>Jenis Media</th>
                                            <th>Publish</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($galeris as $galeri)
                                            <tr>
                                                <td>{{ $galeri->id }}</td>
                                                <td>{{ $galeri->nama_media }}</td>
                                                <td>{{ $galeri->jenis_media }}</td>
                                                <td>{{ $galeri->publish ? 'Ya' : 'Tidak' }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('galeri.show', $galeri->id) }}"
                                                        class="btn btn-icon btn-icon-circle btn-blue btn-icon-style-3"
                                                        data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <span class="btn-icon-wrap">
                                                            <span class="material-icons">visibility</span>
                                                        </span>
                                                    </a>
                                                    <!-- Tombol Edit -->
                                                    <a href="{{ route('galeri.edit', $galeri->id) }}"
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
                                                        onclick="confirmDelete({{ route('galeri.destroy', $galeri->id) }})">
                                                        <span class="btn-icon-wrap">
                                                            <span class="material-icons">delete</span>
                                                        </span>
                                                    </a>

                                                    <!-- Form untuk menghapus artikel -->
                                                    <form id="galeri-delete-form-{{ $galeri->id }}"
                                                        action="{{ route('galeri.destroy', $galeri->id) }}" method="POST"
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

    <script type="text/javascript">
        function confirmDelete(id) {
            // Tampilkan dialog konfirmasi
            let confirmation = confirm('Apakah Anda yakin ingin menghapus galeri ini?');

            // Jika pengguna memilih OK, submit form
            if (confirmation) {
                document.getElementById('galeri-delete-form-' + id).submit();
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
