@extends('petugas.theme.master')

@section('content')
    <div class="mt-4 container-fluid px-xxl-65 px-xl-20">
        <div class="mb-4 hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><i class="fa fa-book"></i></span>Galeri</h4>
        </div>

        <!-- Tampilkan pesan error jika ada -->
        @error('foto')
            <div class="alert alert-danger alert-wth-icon fade show" role="alert">
                <span class="alert-icon-wrap"><i class="zmdi zmdi-block"></i></span>
                {{ $message }}
            </div>
        @enderror

        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <p class="mb-4">Formulir Pengisian Data Galeri Perpustakaan Primabaca YPPSB</p>

                    <!-- Tampilkan file yang sudah ada -->
                    <div class="form-group">
                        <label for="existing_files">File Media yang Sudah Ada:</label>

                        <div class="row">
                            @foreach ($galeri->file as $file)
                                <div class="mb-3 col-sm-6 col-md-4 col-lg-3">
                                    @if ($galeri->jenis_media == 'foto')
                                        <img src="{{ asset('uploads/galeri/' . $file) }}" alt="Media" class="img-fluid"
                                            style="max-width: 100%; height: auto;">
                                    @else
                                        <video class="w-100" controls>
                                            <source src="{{ asset('uploads/galeri/' . $file) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @endif
                                    <div class="mt-2">{{ $file }}</div>

                                    <!-- Tombol untuk menghapus file -->
                                    <form action="{{ route('galeri.deleteFile', [$galeri->id, $file]) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="mt-2 btn btn-danger btn-sm">Hapus</button>
                                    </form>

                                    <!-- Opsi untuk mengganti file -->
                                    <input type="file" name="replace_file[{{ $file }}]"
                                        class="mt-2 form-control">
                                    <small class="text-muted">Pilih file untuk mengganti media ini (opsional).</small>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <hr>

                    <!-- Form untuk mengedit galeri -->
                    <form action="{{ route('galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_media">Nama Media:</label>
                                    <input type="text" name="nama_media" class="form-control"
                                        value="{{ $galeri->nama_media }}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_media">Jenis Media:</label>
                                    <select name="jenis_media" class="form-control" required>
                                        <option value="foto" {{ $galeri->jenis_media == 'foto' ? 'selected' : '' }}>Foto
                                        </option>
                                        <option value="video" {{ $galeri->jenis_media == 'video' ? 'selected' : '' }}>Video
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="file">Tambah File Media (Opsional):</label>
                            <input type="file" name="file[]" class="form-control" multiple>
                            <small class="text-muted">Anda dapat memilih lebih dari satu file.</small>
                        </div>

                        <div class="form-group">
                            <label for="publish">Publish:</label>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="publish" class="custom-control-input" id="publishCheckbox"
                                    value="1" {{ $galeri->publish ? 'checked' : '' }}>
                                <label class="custom-control-label" for="publishCheckbox">Ya</label>
                            </div>
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

    <!-- Bootstrap Dropify CSS -->
    <link href="/theme/vendors/dropify/dist/css/dropify.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('js')
    <!-- Dropzone JavaScript -->
    <script src="/theme/vendors/dropzone/dist/dropzone.js"></script>

    <!-- Dropify JavaScript -->
    <script src="/theme/vendors/dropify/dist/js/dropify.min.js"></script>

    <!-- Form File Upload Data JavaScript -->
    <script src="/theme/dist/js/form-file-upload-data.js"></script>
@endsection
