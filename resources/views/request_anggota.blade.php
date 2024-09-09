@extends('layouts.master')

@section('content')
    <div class="text-center bg-fixed shadow breadcrumb-area dark text-light"
        style="background-image: url(/perpus/img-1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Request Anggota Baru</h1>
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
                            <h3 class="display-4">Form Pendaftaran Anggota Baru</h3>
                        </div>
                        <div class="panel-body">
                            <!-- Display success message -->
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <!-- Form -->
                            <form action="{{ route('home.request_anggota_store') }}" method="POST" class="form-horizontal"
                                enctype="multipart/form-data">
                                @csrf

                                <!-- Input Nama -->
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="name">Nama Lengkap:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Masukkan nama lengkap" required>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Input Email -->
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="email">Email:</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="Masukkan email" required>
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Input Unit (Dropdown) -->
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="unit">Unit:</label>
                                    <div class="col-sm-9">
                                        <select name="unit" class="form-control" id="unit" required>
                                            <option value="">Pilih Unit</option>
                                            <option value="Instansi KPC">Instansi KPC</option>
                                            <option value="UKA">UKA</option>
                                            <option value="TK">TK</option>
                                            <option value="SD 1">SD 1</option>
                                            <option value="SD 2">SD 2</option>
                                            <option value="SD 3">SD 3</option>
                                            <option value="SMP">SMP</option>
                                            <option value="SMA">SMA</option>
                                            <option value="KNE">KNE</option>
                                            <option value="UMUM">UMUM</option>
                                        </select>
                                        @error('unit')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Input Alamat -->
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="alamat">Alamat:</label>
                                    <div class="col-sm-9">
                                        <textarea name="alamat" class="form-control" id="alamat" placeholder="Masukkan alamat" required>{{ old('alamat') }}</textarea>
                                        @error('alamat')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Input Nomor HP -->
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="no_hp">Nomor HP:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="no_hp" class="form-control" id="no_hp"
                                            placeholder="Masukkan nomor HP" value="{{ old('no_hp') }}" required>
                                        @error('no_hp')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Input Pekerjaan (Dropdown) -->
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="pekerjaan">Pekerjaan:</label>
                                    <div class="col-sm-9">
                                        <select name="pekerjaan" class="form-control" id="pekerjaan" required>
                                            <option value="">Pilih Pekerjaan</option>
                                            <option value="Guru">Guru</option>
                                            <option value="Pegawai">Pegawai</option>
                                            <option value="Mahasiswa">Mahasiswa</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                        @error('pekerjaan')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Upload Foto -->
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="foto">Upload Foto:</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="foto" class="form-control" id="foto" required>
                                        @error('foto')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="text-center form-group">
                                    <button type="submit" class="btn btn-primary">Daftar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
