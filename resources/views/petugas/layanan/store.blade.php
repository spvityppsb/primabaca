@extends('petugas.theme.master')

@section('content')
    <div class="container-fluid px-xxl-65 px-xl-20 mt-20">
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><i class="fa fa-book"></i></span>Layanan Perpustakaan</h4>
        </div>

        @error('foto')
            <div class="alert alert-danger alert-wth-icon fade show" role="alert">
                <span class="alert-icon-wrap"><i class="zmdi zmdi-block"></i></span>
                {{ $message }}
            </div>
        @enderror
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <form action="{{ route('layanan.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="form-row">
                            <div class="col-md-4 mb-10">
                                <label>Judul</label>
                                <input type="text" name="judul"
                                    class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}"
                                    placeholder="Judul">
                                @error('judul')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-10">
                                <label>Keterangan</label>
                                <input type="text" name="keterangan"
                                    class="form-control @error('keterangan') is-invalid @enderror"
                                    value="{{ old('keterangan') }}" placeholder="Keterangan">
                                @error('keterangan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-10">
                                <label>Link URL</label>
                                <input type="text" name="url" class="form-control @error('url') is-invalid @enderror"
                                    value="{{ old('url') }}" placeholder="Keterangan">
                                @error('url')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col-sm">
                                <label for="validationCustom01">Logo Layanan Perpustakaan (50x50px)</label>
                                <input type="file" id="foto" name="foto" class="dropify" placeholder="Judul " />
                                @error('foto')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-primary btn-wth-icon mt-10 w-100" type="submit">
                            <span class="btn-text">Tambahkan Layanan Perpustakaan Baru</span>
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
