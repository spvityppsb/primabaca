@extends('petugas.theme.master')

@section('content')
    <div class="mt-4 container-fluid px-xxl-65 px-xl-20">
        <div class="mb-4 hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><i class="fa fa-image"></i></span> Detail Galeri</h4>
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
                    <p class="mb-4">Formulir Pengisian Data Galeri Perpustakaan Primabaca YPPSB</p>

                    <div class="container">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nama_media">Nama Media:</label>
                                    <p>{{ $galeri->nama_media }}</p>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="jenis_media">Jenis Media:</label>
                                    <p>{{ $galeri->jenis_media }}</p>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="publish">Status Publish:</label>
                                    <p>{{ $galeri->publish ? 'Ya' : 'Tidak' }}</p>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="files">File Media:</label>
                                    <div class="row">
                                        @foreach ($galeri->file as $file)
                                            <div class="mb-3 col-md-4">
                                                @if ($galeri->jenis_media == 'foto')
                                                    <img src="{{ asset('uploads/galeri/' . $file) }}" alt="Media"
                                                        class="rounded img-fluid"
                                                        style="max-height: auto; width: 100%; object-fit: cover;">
                                                @else
                                                    <video class="w-100" controls>
                                                        <source src="{{ asset('uploads/galeri/' . $file) }}"
                                                            type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                @endif
                                                <div class="mt-2 text-center">{{ $file }}</div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>

                            <a href="{{ route('galeri.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <!-- No additional CSS needed if using Bootstrap classes properly -->
@endsection

@section('js')
    <!-- No additional JS needed if not using Dropzone/Dropify in this view -->
@endsection
