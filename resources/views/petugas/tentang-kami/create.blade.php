@extends('petugas.theme.master')

@section('content')
    <div class="container-fluid px-xxl-65 px-xl-20 mt-20">
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><i class="fa fa-book"></i></span>Pengaturan</h4>
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
                    <form action="{{ route('tentang-kami.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="form-row">
                            <div class="col-md-12 mb-10">
                                <label for="profil">Profil</label>
                                <textarea type="text" name="profil" class="form-control @error('profil') is-invalid @enderror" id="profil"
                                    placeholder="Profile" value="{{ old('profil') }}" autofocus></textarea>
                                @error('profil')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-10">
                                <label for="visi">Visi</label>
                                <textarea type="text" name="visi" class="form-control @error('visi') is-invalid @enderror" id="visi"
                                    placeholder="Visi" value="{{ old('visi') }}"></textarea>
                                @error('visi')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-10">
                                <label for="misi">Misi </label>
                                <textarea type="text" name="misi" class="form-control @error('misi') is-invalid @enderror" id="misi"
                                    placeholder="Misi" value="{{ old('misi') }}"></textarea>
                                @error('misi')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-10">
                                <label>Alamat</label>
                                <textarea type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror"
                                    value="{{ old('alamat') }}" placeholder="alamat"></textarea>
                                @error('alamat')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-10">
                                <label for="email">Email</label>
                                <input type="text" name="email"
                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                    value="{{ old('email') }}" placeholder="Email">
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-10">
                                <label for="telepon">Telepon</label>
                                <input type="text" name="telepon"
                                    class="form-control @error('telepon') is-invalid @enderror" id="telepon"
                                    value="{{ old('telepon') }}" placeholder="Telepon">
                                @error('telepon')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-10">
                                <label>Maps</label>
                                <input type="text" name="maps"
                                    class="form-control @error('maps') is-invalid @enderror" value="{{ old('maps') }}"
                                    placeholder="Maps">
                                @error('maps')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-10">
                                <label for="jam_buka_1">Jam Buka 1</label>
                                <input type="text" name="jam_buka_1"
                                    class="form-control @error('jam_buka_1') is-invalid @enderror"
                                    value="{{ old('jam_buka_1') }}" placeholder="Jam Buka 1">
                                @error('jam_buka_1')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-10">
                                <label for="jam_buka_2">Jam Buka 2</label>
                                <input type="text" name="jam_buka_2"
                                    class="form-control @error('jam_buka_2') is-invalid @enderror" id="jam_buka_2"
                                    value="{{ old('jam_buka_2') }}" placeholder="Jam Buka 2">
                                @error('jam_buka_2')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">
                                <label for="foto" class="form-label">Foto Logo</label>
                                <input class="mb-3 form-control @error('foto') is-invalid @enderror" type="file"
                                    id="foto" name="foto" onchange="previewImage()">
                                @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="col d-blok card-body text-center">
                                    <img src="" class="img-preview img-fluid mb-3 col-sm-5" id="frame"
                                        style="max-height: 300px; overflow:hidden; width: 300px;">
                                    <img class="img-preview img-fluid">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="foto_visi" class="form-label">Foto Visi</label>
                                <input class="mb-3 form-control @error('foto_visi') is-invalid @enderror" type="file"
                                    id="foto_visi" name="foto_visi" onchange="previewImage()">
                                @error('foto_visi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="col d-blok card-body text-center">
                                    <img src="" class="img-preview img-fluid mb-3 col-sm-5" id="frame"
                                        style="max-height: 300px; overflow:hidden; width: 300px;">
                                    <img class="img-preview img-fluid">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-wth-icon mt-10 w-100" type="submit">
                            <span class="btn-text">Tambahkan Data Baru</span>
                        </button>
                    </form>
                </section>
            </div>
        </div>
    </div>
    <script>
        function previewImage() {

            frame.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
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
