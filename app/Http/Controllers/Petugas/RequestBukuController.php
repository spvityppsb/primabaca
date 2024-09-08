<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\RequestBuku;
use Illuminate\Http\Request;

class RequestBukuController extends Controller
{
    public function index()
    {
        $request_buku = RequestBuku::select('id', 'nama', 'sekolah', 'judul_buku', 'pengarang', 'penerbit', 'created_at')
            ->orderBy('created_at', 'ASC')
            ->get();

        return view('petugas.request-buku.index', compact('request_buku'));
    }
}
