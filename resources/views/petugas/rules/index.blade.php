@extends('petugas.theme.master')

@section('content')
    <div class="container-fluid px-xxl-65 px-xl-20 mt-20">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon">
                    <i class="material-icons">warning</i></span>Tata Cara Peminjaman / Pengembalian
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
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <p class="mb-40">
                        <button class="btn btn-primary btn-wth-icon btn-sm" data-toggle="modal" data-target="#createrak">
                            <span class="icon-label">
                                <span class="material-icons">
                                    control_point
                                </span>
                            </span>
                            <span class="btn-text">Tambah Tata Cara Peminjaman</span>
                        </button>
                    <div class="modal fade" id="createrak" tabindex="-1" role="dialog" aria-labelledby="createrak"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Form Tata Cara Peminjaman</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('rules.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="validationCustom01">Tata Cara Peminjaman</label>
                                            <textarea type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror"
                                                value="{{ old('keterangan') }}" placeholder="Keterangan"></textarea>
                                            @error('keterangan')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </p>
                    <div class="row">
                        <div class="col-xl">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table class="table table-md mb-0">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th class="text-center text-bold">Tata Cara Peminjaman</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($rule_peminjaman as $data)
                                                <tr>
                                                    <td><i class="material-icons">done_all</i></td>
                                                    <td>{{ Str::upper($data->keterangan) }}</td>
                                                    <td>
                                                        <a href="" data-toggle="modal"
                                                            data-target="#updaterak{{ $data->id_tata_peminjaman }}"
                                                            class="mr-25" data-toggle="tooltip" data-original-title="Edit">
                                                            <i class="icon-pencil"></i> </a>
                                                        <a href="{{ route('rules.destroy', $data->id_tata_peminjaman) }}"
                                                            data-toggle="tooltip" data-original-title="Hapus"
                                                            onclick="event.preventDefault();
                                                            document.getElementById('rule_peminjaman-delete-form-{{ $data->id_tata_peminjaman }}').submit();">
                                                            <i class="icon-trash txt-danger" style="color: red"></i></a>
                                                        <form
                                                            id="rule_peminjaman-delete-form-{{ $data->id_tata_peminjaman }}"
                                                            action="{{ route('rules.destroy', $data->id_tata_peminjaman) }}"
                                                            method="POST" class="d-none">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                    </td>
                                                    <div class="modal fade" id="updaterak{{ $data->id_tata_peminjaman }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="updaterak{{ $data->id_tata_peminjaman }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Edit Tata Cara Peminjaman</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form
                                                                    action="{{ route('rules.update', $data->id_tata_peminjaman) }}"
                                                                    method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="validationCustom01">Keterangan</label>
                                                                            <textarea type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror"
                                                                                value="{{ old('keterangan') }}" placeholder="Keterangan">{{ $data->keterangan }}</textarea>
                                                                            @error('keterangan')
                                                                                <span
                                                                                    class="invalid-feedback">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Tutup</button>
                                                                        <button class="btn btn-primary"
                                                                            type="submit">Perbaharui
                                                                            Tata Cara Peminjaman</button>
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
                                {{ $rule_peminjaman->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <hr>
        <div class="row justify-content-md-center">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <p class="mb-40">
                        <button class="btn btn-primary btn-wth-icon btn-sm" data-toggle="modal"
                            data-target="#create_pengembalian">
                            <span class="icon-label">
                                <span class="material-icons">
                                    control_point
                                </span>
                            </span>
                            <span class="btn-text">Tambah Tata Cara Pengembalian</span>
                        </button>
                    <div class="modal fade" id="create_pengembalian" tabindex="-1" role="dialog"
                        aria-labelledby="create_pengembalian" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Form Tata Cara Pengembalian</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('rule-pengembalian.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="validationCustom01">Tata Cara Pengembalian</label>
                                            <textarea type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror"
                                                value="{{ old('keterangan') }}" placeholder="Keterangan"></textarea>
                                            @error('keterangan')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Tutup</button>
                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </p>
                    <div class="row">
                        <div class="col-xl">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table class="table table-md mb-0">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th class="text-center">Tata Cara Pengembalian</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($rule_pengembalian as $data)
                                                <tr>
                                                    <td><i class="material-icons">done_all</i></td>
                                                    <td>{{ Str::upper($data->keterangan) }}</td>
                                                    <td>
                                                        <a href="" data-toggle="modal"
                                                            data-target="#update_pengembalian{{ $data->id_tata_pengembalian }}"
                                                            class="mr-25" data-toggle="tooltip"
                                                            data-original-title="Edit">
                                                            <i class="icon-pencil"></i> </a>
                                                        <a href="{{ route('rule-pengembalian.destroy', $data->id_tata_pengembalian) }}"
                                                            data-toggle="tooltip" data-original-title="Hapus"
                                                            onclick="event.preventDefault();
                                                            document.getElementById('rule_pengembalian-delete-form-{{ $data->id_tata_pengembalian }}').submit();">
                                                            <i class="icon-trash txt-danger" style="color: red"></i></a>
                                                        <form
                                                            id="rule_pengembalian-delete-form-{{ $data->id_tata_pengembalian }}"
                                                            action="{{ route('rule-pengembalian.destroy', $data->id_tata_pengembalian) }}"
                                                            method="POST" class="d-none">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                    </td>
                                                    <div class="modal fade"
                                                        id="update_pengembalian{{ $data->id_tata_pengembalian }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="update_pengembalian{{ $data->id_tata_pengembalian }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Edit Tata Cara Peminjaman</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form
                                                                    action="{{ route('rule-pengembalian.update', $data->id_tata_pengembalian) }}"
                                                                    method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="validationCustom01">Keterangan</label>
                                                                            <textarea type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror"
                                                                                value="{{ old('keterangan') }}" placeholder="Keterangan">{{ $data->keterangan }}</textarea>
                                                                            @error('keterangan')
                                                                                <span
                                                                                    class="invalid-feedback">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Tutup</button>
                                                                        <button class="btn btn-primary"
                                                                            type="submit">Perbaharui
                                                                            Tata Cara Pengembalian</button>
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
                                {{ $rule_peminjaman->links('pagination::bootstrap-5') }}
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
