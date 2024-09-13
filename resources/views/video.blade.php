@extends('petugas.theme.master')

@section('content')
    <div class="mt-20 container-fluid px-xxl-65 px-xl-20">
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><i class="fa fa-video-camera"></i></span>Galeri</h4>
        </div>

        <!-- Tampilkan pesan error global -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <p class="mb-40">Formulir Pengisian Data Galeri Perpustakaan Primabaca YPPSB</p>
                    
                    <!-- Form start -->
                    <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Nama Media -->
                        <div class="form-group">
                            <label for="nama_media">Nama Media:</label>
                            <input type="text" name="nama_media" class="form-control" value="{{ old('nama_media') }}" required>
                            @error('nama_media')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Jenis Media -->
                        <div class="form-group">
                            <label for="jenis_media">Jenis Media:</label>
                            <select name="jenis_media" class="form-control" required>
                                <option value="foto" {{ old('jenis_media') == 'foto' ? 'selected' : '' }}>Foto</option>
                                <option value="video" {{ old('jenis_media') == 'video' ? 'selected' : '' }}>Video</option>
                            </select>
                            @error('jenis_media')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- File Input -->
                        <div class="form-group">
                            <label for="file">File Media (foto/video):</label>
                            <input type="file" name="file[]" class="form-control dropify" data-max-file-size="20M" multiple required>
                            <p class="help-block">Anda dapat mengunggah beberapa file dengan menekan Ctrl (atau Command di Mac) saat memilih file.</p>
                            @error('file')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Publish Checkbox -->
                        <div class="form-group">
                            <label for="publish">Publish:</label>
                            <input type="checkbox" name="publish" value="1" {{ old('publish') ? 'checked' : '' }}>
                        </div>
git
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <!-- Dropify CSS -->
    <link href="/theme/vendors/dropify/dist/css/dropify.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('js')
    <!-- Dropify JavaScript -->
    <script src="/theme/vendors/dropify/dist/js/dropify.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize Dropify for enhanced file upload input
            $('.dropify').dropify({
                messages: {
                    'default': 'Seret dan lepaskan file di sini atau klik',
                    'replace': 'Seret dan lepaskan atau klik untuk mengganti',
                    'remove': 'Hapus',
                    'error': 'Ooops, ada yang salah.'
                }
            });
        });
    </script>
@endsection
