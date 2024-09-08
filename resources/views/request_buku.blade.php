@extends('layouts.master')

@section('content')
    <div class="text-center bg-fixed shadow breadcrumb-area dark text-light"
        style="background-image: url(/perpus/img-1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Request Buku</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="login-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="shadow-lg panel panel-default">
                        <div class="text-center panel-heading">
                            <h3 class="display-4">Form Request Buku</h3>
                        </div>
                        <div class="panel-body">
                            <!-- Display success message -->
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <!-- Form -->
                            {{-- <form action="#" method="POST" class="form-horizontal"> --}}
                            <form action="{{ route('home.request_buku_store') }}" method="POST" class="form-horizontal">
                                @csrf
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="nama">Nama Lengkap:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nama" class="form-control" id="nama"
                                            placeholder="Masukkan nama" required>
                                        @error('nama')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="sekolah">Asal Sekolah/Unit/Instansi:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="sekolah" class="form-control" id="sekolah"
                                            placeholder="Masukkan sekolah" required>
                                        @error('sekolah')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="judul_buku">Judul Buku:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="judul_buku" class="form-control" id="judul_buku"
                                            placeholder="Masukkan judul buku" required>
                                        @error('judul_buku')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="pengarang">Pengarang:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="pengarang" class="form-control" id="pengarang"
                                            placeholder="Masukkan nama pengarang" required>
                                        @error('pengarang')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="penerbit">Penerbit:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="penerbit" class="form-control" id="penerbit"
                                            placeholder="Masukkan nama penerbit" required>
                                        @error('penerbit')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-center form-group">
                                    <button type="submit" class="btn btn-primary">Kirim Request</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
