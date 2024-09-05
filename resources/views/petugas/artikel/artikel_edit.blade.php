@extends('petugas.theme.master')

@section('content')
    <div class="container-fluid px-xxl-65 px-xl-20 mt-20">
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><i class="fa fa-book"></i></span>Artikel</h4>
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
                    <p class="mb-40">Formulir Pengisian Data Artikel Perpustakaan Primabaca YPPSB</p>
                    <form action="{{ route('artikel.update', $artikel->id_artikel) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-row">
                            <div class="col-md-12 mb-10">
                                <label for="validationCustom01">Kode Artikel</label>
                                <input type="text" name="id_artikel"
                                    class="form-control @error('id_artikel') is-invalid @enderror" id="validationCustom01"
                                    placeholder="Kode Artikel" value="{{ $artikel->id_artikel }}" autofocus disabled>
                                @error('id_artikel')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-10">
                                <label for="validationCustom01">Judul Artikel </label>
                                <input type="text" name="judul"
                                    class="form-control @error('judul') is-invalid @enderror" placeholder="Judul Artikel"
                                    value="{{ $artikel->judul }}">
                                @error('judul')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-10">
                                <label>Slug</label>
                                <input type="text" name="slug"
                                    class="form-control @error('slug') is-invalid @enderror" value="{{ $artikel->slug }}"
                                    placeholder="Penulis" disabled>
                                @error('slug')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-10">
                                <label>Penulis</label>
                                <input type="text" name="created_by"
                                    class="form-control @error('created_by') is-invalid @enderror"
                                    value="{{ $artikel->created_by }}" placeholder="Penulis" disabled>
                                @error('created_by')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm mb-10">
                                <label for="foto">Foto Artikel</label>
                                <input type="hidden" name="oldImage" value="{{ $artikel->foto }}">
                                @if ($artikel->foto == null)
                                    <input type="file" id="input-file-now" name="foto" class="dropify" />
                                @else
                                    <input type="file" id="input-foto-now" name="foto" class="dropify"
                                        data-default-file="/foto_artikel/{{ $artikel->foto }}" />
                                    @error('foto')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                @endif
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-10">
                                <label for="validationCustom01">Isi Artikel</label>
                                <textarea class="form-control" name="deskripsi" id="deskripsi">{{ $artikel->deskripsi }}</textarea>
                                @error('deskripsi')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-primary btn-wth-icon mt-10 w-100" type="submit">
                            <span class="btn-text">Perbaharui Artikel</span>
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
