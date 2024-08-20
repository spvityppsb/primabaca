@extends('petugas.theme.master')

@section('content')
    <div class="container-fluid px-xxl-65 px-xl-20 mt-20">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon">
                    <i class="material-icons">home</i></span>Data Instansi
            </h4>
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
        <div class="row justify-content-md-center">
            <div class="col-xl-6">
                <section class="hk-sec-wrapper">
                    <p class="mb-40">
                        <button class="btn btn-primary btn-wth-icon btn-sm" data-toggle="modal"
                            data-target="#createsekolah">
                            <span class="icon-label">
                                <span class="material-icons">
                                    control_point
                                </span>
                            </span>
                            <span class="btn-text">Tambah Instansi Baru</span>
                        </button>
                    <div class="modal fade" id="createsekolah" tabindex="-1" role="dialog" aria-labelledby="createsekolah"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Form Tambah Instansi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('sekolah.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="validationCustom01">Nama Instansi</label>
                                            <input type="text" class="form-control" name="jenis_sekolah"
                                                id="validationCustom01" placeholder="SD YPPSB 2/Pegawai KPC" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <button class="btn btn-primary" type="submit">Simpan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </p>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table class="table table-sm mb-0">
                                        <thead>
                                            <tr>
                                                <th>Instansi</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sekolah as $data)
                                                <tr>
                                                    <td>{{ Str::upper($data->jenis_sekolah) }}</td>
                                                    <td>
                                                        <a href="" data-toggle="modal"
                                                            data-target="#updatesekolah{{ $data->id_sekolah }}"
                                                            class="mr-25" data-toggle="tooltip" data-original-title="Edit">
                                                            <i class="icon-pencil"></i> </a>
                                                        <a href="{{ route('sekolah.destroy', $data->id_sekolah) }}"
                                                            data-toggle="tooltip" data-original-title="Hapus"
                                                            onclick="event.preventDefault();
                                                            document.getElementById('sekolah-delete-form-{{ $data->id_sekolah }}').submit();">
                                                            <i class="icon-trash txt-danger" style="color: red"></i></a>
                                                        <form id="sekolah-delete-form-{{ $data->id_sekolah }}"
                                                            action="{{ route('sekolah.destroy', $data->id_sekolah) }}"
                                                            method="POST" class="d-none">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                    </td>
                                                    <div class="modal fade" id="updatesekolah{{ $data->id_sekolah }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="updatesekolah{{ $data->id_sekolah }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Edit Instansi</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form
                                                                    action="{{ route('sekolah.update', $data->id_sekolah) }}"
                                                                    method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label for="validationCustom01">Nama
                                                                                Instansi</label>
                                                                            <input type="text" class="form-control"
                                                                                name="jenis_sekolah"
                                                                                id="validationCustom01"
                                                                                placeholder="Sekolah 3 A"
                                                                                value="{{ $data->jenis_sekolah }}"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Tutup</button>
                                                                        <button class="btn btn-primary"
                                                                            type="submit">Perbaharui</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="d-felx justify-content-center mt-2">
                                {{ $sekolah->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(700, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2500);
    </script>
@endsection
