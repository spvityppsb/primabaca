<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\RequestAnggota;
use Illuminate\Http\Request;

class RequestAnggotaPetugasController extends Controller
{
    //
    public function index()
    {
        $request_anggota = RequestAnggota::select('id', 'name', 'alamat', 'unit', 'email', 'pekerjaan', 'no_hp', 'foto', 'created_at')
            ->orderBy('created_at', 'ASC')
            ->get();

        return view('petugas.request-anggota.index', compact('request_anggota'));
    }
}
