@extends('petugas.theme.master')

@section('content')
    <div class="container-fluid px-xxl-65 px-xl-20 mt-20">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon">
                    <i class="material-icons">policy</i></span>Data Tentang Kami
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
        @php
            $cek_tentang_kami = DB::Table('tentang_kami')->get();
        @endphp
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    @if ($cek_tentang_kami->count() < 1)
                        <p class="mb-40">
                            <a href="{{ route('tentang-kami.create') }}" class="btn btn-primary btn-wth-icon btn-sm mb-20">
                                <span class="icon-label">
                                    <span class="material-icons">
                                        create_new_folder
                                    </span>
                                </span>
                                <span class="btn-text">Update Data</span>
                            </a>
                        </p>
                    @else
                        <form action="{{ route('tentang-kami.update', 1) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-row">
                                <div class="col-md-12 mb-10">
                                    <label for="profil">Profil</label>
                                    <textarea type="text" name="profil" class="form-control @error('profil') is-invalid @enderror" id="profil"
                                        placeholder="Profile">{{ $tentang_kami->profil }}</textarea>
                                    @error('profil')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-10">
                                    <label for="visi">Visi</label>
                                    <textarea type="text" name="visi" class="form-control @error('visi') is-invalid @enderror" id="visi"
                                        placeholder="Visi">{{ $tentang_kami->visi }}</textarea>
                                    @error('visi')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-10" contenteditable="true">
                                    <label for="misi">Misi </label>
                                    <textarea type="text" name="misi" class="form-control @error('misi') is-invalid @enderror" id="misi"
                                        placeholder="Misi">{{ $tentang_kami->misi }}</textarea>
                                    @error('misi')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-10">
                                    <label>Alamat</label>
                                    <textarea type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="alamat">{{ $tentang_kami->alamat }}</textarea>
                                    @error('alamat')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-10">
                                    <label for="email">Email</label>
                                    <input type="text" name="email"
                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                        value="{{ $tentang_kami->email }}" placeholder="Email">
                                    @error('email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-10">
                                    <label for="telepon">Telepon</label>
                                    <input type="text" name="telepon"
                                        class="form-control @error('telepon') is-invalid @enderror" id="telepon"
                                        value="{{ $tentang_kami->telepon }}" placeholder="Telepon">
                                    @error('telepon')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-10">
                                    <label>Maps</label>
                                    <input type="text" name="maps"
                                        class="form-control @error('maps') is-invalid @enderror"
                                        value="{{ $tentang_kami->maps }}" placeholder="Maps">
                                    @error('maps')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-10">
                                    <label for="jam_buka_1">Jam Buka 1</label>
                                    <input type="text" name="jam_buka_1"
                                        class="form-control @error('jam_buka_1') is-invalid @enderror"
                                        value="{{ $tentang_kami->jam_buka_1 }}" placeholder="Jam Buka 1">
                                    @error('jam_buka_1')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-10">
                                    <label for="jam_buka_2">Jam Buka 2</label>
                                    <input type="text" name="jam_buka_2"
                                        class="form-control @error('jam_buka_2') is-invalid @enderror" id="jam_buka_2"
                                        value="{{ $tentang_kami->jam_buka_2 }}" placeholder="Jam Buka 2">
                                    @error('jam_buka_2')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm">
                                    <label for="foto">Foto Logo</label>
                                    <input type="hidden" name="oldImage" value="{{ $tentang_kami->foto }}">
                                    @if ($tentang_kami->foto == null)
                                        <input type="file" id="input-file-now" name="foto" class="dropify" />
                                    @else
                                        <input type="file" id="input-foto-now" name="foto" class="dropify"
                                            data-default-file="/storage/{{ $tentang_kami->foto }}" />
                                        @error('foto')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    @endif
                                </div>
                                <div class="col-sm">
                                    <label for="foto_visi">Foto Visi</label>
                                    <input type="hidden" name="oldImageVisi" value="{{ $tentang_kami->foto_visi }}">
                                    @if ($tentang_kami->foto_visi == null)
                                        <input type="file" id="input-file-now" name="foto_visi" class="dropify" />
                                    @else
                                        <input type="file" id="input-foto-now" name="foto_visi" class="dropify"
                                            data-default-file="/storage/{{ $tentang_kami->foto_visi }}" />
                                        @error('foto_visi')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    @endif
                                </div>
                            </div>
                            <input type="hidden" name="id_tentang_kami" value="{{ $tentang_kami->id_tentang_kami }}">
                            <button class="btn btn-primary btn-wth-icon mt-10 w-100" type="submit">
                                <span class="btn-text">Update Data</span>
                            </button>
                        </form>
                    @endif
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
