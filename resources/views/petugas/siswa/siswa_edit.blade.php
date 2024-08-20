@extends('petugas.theme.master')

@section('content')
    <div class="container-fluid px-xxl-65 px-xl-20 mt-20">
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><i class="fa fa-graduation-cap"></i></span>Edit Anggota</h4>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <p class="mb-40">Formulir Pengisian Data Anggota Pendaftaraan Anggota Perpustakaan Primabaca</p>
                    <form action="{{ route('siswa.update', $siswa->id_siswa) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-row">
                            <div class="col-md-6 mb-10">
                                <label for="validationCustom01">Barcode Anggota</label>
                                {!! DNS1D::getBarcodeHTML($siswa->barcode, 'CODABAR') !!}
                                <small class="form-text text-muted">
                                    {{ $siswa->barcode }}
                                </small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 mb-10">
                                <label for="validationCustom01">Nomor Anggota</label>
                                <input type="text" name="nis" class="form-control @error('nis') is-invalid @enderror"
                                    id="validationCustom01" placeholder="Nomor Induk Anggota" value="{{ $siswa->nis }}"
                                    autofocus>
                                @error('nis')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-10">
                                <label for="validationCustom01">Nama Lengkap Anggota</label>
                                <input type="text" name="nama_siswa"
                                    class="form-control @error('nama_siswa') is-invalid @enderror" id="validationCustom01"
                                    placeholder="Nama Lengkap Anggota" value="{{ $siswa->nama_siswa }}">
                                @error('nama_siswa')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-10">
                                <label for="validationCustom01">Telepon</label>
                                <input type="number" name="telp"
                                    class="form-control @error('telp') is-invalid @enderror" id="validationCustom01"
                                    value="{{ $siswa->telp }}">
                                @error('telp')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-10">
                                <label for="validationCustom01">Tanggal Lahir Anggota</label>
                                <input type="date" name="tgl_lahir"
                                    class="form-control @error('tgl_lahir') is-invalid @enderror" id="validationCustom01"
                                    value="{{ $siswa->tgl_lahir }}">
                                @error('tgl_lahir')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-10">
                                <label for="validationCustom01">Jenis Kelamin</label>
                                <select class="form-control custom-select @error('jk') is-invalid @enderror" name="jk">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="l" {{ $siswa->jenis_kelamin == 'l' ? 'selected' : '' }}>Laki - Laki
                                    </option>
                                    <option value="p" {{ $siswa->jenis_kelamin == 'p' ? 'selected' : '' }}>Perempuan
                                    </option>
                                </select>
                                @error('jk')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-10">
                                <label for="validationCustom01">Instansi</label>
                                <select class="form-control custom-select @error('sekolah') is-invalid @enderror"
                                    name="sekolah">
                                    <option value="">Pilih Instansi</option>
                                    @foreach ($sekolah as $data)
                                        <option value="{{ $data->id_sekolah }}"
                                            {{ $data->id_sekolah == $siswa->sekolah ? 'selected' : '' }}>
                                            {{ $data->jenis_sekolah }}</option>
                                    @endforeach
                                </select>
                                @error('sekolah')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-10">
                                <label for="validationCustom01">Kelas</label>
                                <select class="form-control custom-select @error('kelas') is-invalid @enderror"
                                    name="kelas">
                                    <option value="">Pilih Kelas Anggota</option>
                                    @foreach ($kelas as $data)
                                        <option value="{{ $data->id_kelas }}"
                                            {{ $data->id_kelas == $siswa->kelas ? 'selected' : '' }}>
                                            {{ $data->jenis_kelas }}</option>
                                    @endforeach
                                </select>
                                @error('kelas')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 mb-10">
                                <label for="validationCustom01">Alamat</label>
                                <textarea type="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror"
                                    id="validationCustom01" value="{{ $siswa->alamat }}">{{ $siswa->alamat }}</textarea>
                                @error('alamat')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm">
                                <label for="validationCustom01">Foto Anggota</label>
                                @if ($siswa->foto == null)
                                    <input type="file" id="input-file-now" name="foto" class="dropify" />
                                @else
                                    <input type="file" id="input-file-now" name="foto" class="dropify"
                                        data-default-file="/foto_siswa/{{ $siswa->foto }}" />
                                @endif
                            </div>
                        </div>
                        <button class="btn btn-info btn-wth-icon mt-10 w-100" type="submit">
                            <span class="btn-text">Perbaharui Data</span>
                        </button>
                    </form>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <!-- Bootstrap Dropzone CSS -->
    <link href="/theme/vendors/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Dropzone CSS -->
    <link href="/theme/vendors/dropify/dist/css/dropify.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('js')
    <!-- Dropzone JavaScript -->
    <script src="/theme/vendors/dropzone/dist/dropzone.js"></script>

    <!-- Dropify JavaScript -->
    <script src="/theme/vendors/dropify/dist/js/dropify.min.js"></script>

    <!-- Form Flie Upload Data JavaScript -->
    <script src="/theme/dist/js/form-file-upload-data.js"></script>
@endsection
