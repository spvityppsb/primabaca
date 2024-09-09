@extends('petugas.theme.master')

@section('content')
    <div class="mt-20 container-fluid px-xxl-65 px-xl-20">
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><i class="fa fa-video-camera"></i></span>Galeri</h4>
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
                    <p class="mb-40">Formulir Pengisian Data Galeri Perpustakaan Primabaca YPPSB</p>
                    <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama_media">Nama Media:</label>
                            <input type="text" name="nama_media" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="jenis_media">Jenis Media:</label>
                            <select name="jenis_media" class="form-control" required>
                                <option value="foto">Foto</option>
                                <option value="video">Video</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="file">File Media (foto/video):</label>
                            <input type="file" name="file[]" class="form-control" multiple required>
                            <p class="help-block">Pilih lebih dari satu file dengan menekan tombol Ctrl (Command di Mac)
                                saat memilih file.</p>
                        </div>

                        <div class="form-group">
                            <label for="publish">Publish:</label>
                            <input type="checkbox" name="publish" value="1">
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
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
