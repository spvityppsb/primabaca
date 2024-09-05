<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Buku;
use App\Models\User;
use App\Models\Iklan;
use App\Models\Kepsek;
use App\Models\Layanan;
use App\Models\TentangKami;
use App\Models\RulePeminjaman;
use App\Models\RulePengembalian;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $buku = Buku::join('rak', 'rak.id_rak', '=', 'buku.rak')
            ->select('buku.*', 'rak.jenis_rak')
            ->orderBy('buku.created_at', 'DESC')->limit(8)
            ->get();
        $banner = Iklan::orderBy('created_at', 'ASC')->get();
        $layanan = Layanan::orderBy('created_at', 'DESC')->limit(3)->get();
        // ddd($banner);
        return view('index', compact('banner', 'layanan', 'buku'));
    }

    public function visi()
    {
        $spv = Kepsek::first();
        $petugas = User::orderBy('name', 'ASC')->get();
        $about = TentangKami::where('id_tentang_kami', '=', '1')->first();
        return view('visi', compact(['about'], ['petugas'], ['spv']));
    }

    public function profile()
    {
        return view('profile');
    }

    public function tata_tertib()
    {
        $rule_pengembalian = RulePengembalian::orderBy('id_tata_pengembalian', 'ASC')->paginate(8);
        $rule_peminjaman = RulePeminjaman::orderBy('id_tata_peminjaman', 'ASC')->paginate(8);
        return view('tata_tertib', compact('rule_pengembalian', 'rule_peminjaman'));
    }

    public function kontak()
    {
        $about = TentangKami::where('id_tentang_kami', '=', '1')->first();
        return view('kontak', compact(['about']));
    }

    public function buku()
    {
        $buku = Buku::join('rak', 'rak.id_rak', '=', 'buku.rak')
            ->select('buku.*', 'rak.jenis_rak')
            ->orderBy('buku.nama_buku', 'ASC')
            ->get();
        return view('buku', compact(['buku']));
    }

    public function buku_baru()
    {
        $buku = Buku::join('rak', 'rak.id_rak', '=', 'buku.rak')
            ->select('buku.*', 'rak.jenis_rak')
            ->orderBy('buku.created_at', 'DESC')->limit(10)
            ->get();
        // ddd($buku);
        return view('buku', compact(['buku']));
    }

    public function request_buku()
    {
        return view('request_buku');
    }

    public function cari(Request $request)
    {
        $random = Buku::join('rak', 'rak.id_rak', '=', 'buku.rak')
            ->select('buku.*', 'rak.jenis_rak')
            ->inRandomOrder()
            ->limit(5)
            ->get();

        $buku = Buku::join('rak', 'rak.id_rak', '=', 'buku.rak')
            ->select('buku.*', 'rak.jenis_rak')
            ->where('buku.nama_buku', 'LIKE', '%' . $request->buku . '%')
            ->get();

        return view('buku_cari', compact(['buku', 'random']));
    }


    public function layanan()
    {
        $about = TentangKami::where('id_tentang_kami', '=', '1')->first();
        $layanan = Layanan::orderBy('created_at', 'DESC')->get();
        return view('layanan', compact(['about', 'layanan']));
    }

    public function detail_buku($id)
    {
        $buku = Buku::join('rak', 'rak.id_rak', '=', 'buku.rak')
            ->select('buku.*', 'rak.jenis_rak')
            ->find($id);
        return view('detail_buku', compact(['buku']));
    }

    public function artikel()
    {
        $artikel = Article::orderBy('created_at', 'DESC')->paginate(1);
        // ddd($artikel);
        return view('artikel', compact('artikel'));
    }
}