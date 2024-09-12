<?php

namespace App\Http\Controllers;

use App\Models\{
    Article,
    RequestAnggota,
    RequestBuku,
    Buku,
    Galeri,
    User,
    Iklan,
    Kepsek,
    Layanan,
    TentangKami,
    RulePeminjaman,
    RulePengembalian
};
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $buku = Buku::with('rak')->latest()->limit(8)->get();
        $banner = Iklan::oldest()->get();
        $layanan = Layanan::latest()->limit(3)->get();

        return view('index', compact('banner', 'layanan', 'buku'));
    }

    public function visi()
    {
        $spv = Kepsek::first();
        $petugas = User::orderBy('name')->get();
        $about = TentangKami::find(1);

        return view('visi', compact('about', 'petugas', 'spv'));
    }

    public function profile()
    {
        return view('profile');
    }

    public function tata_tertib()
    {
        $rule_pengembalian = RulePengembalian::orderBy('id_tata_pengembalian')->paginate(8);
        $rule_peminjaman = RulePeminjaman::orderBy('id_tata_peminjaman')->paginate(8);

        return view('tata_tertib', compact('rule_pengembalian', 'rule_peminjaman'));
    }

    public function kontak()
    {
        $about = TentangKami::find(1);
        return view('kontak', compact('about'));
    }

    public function buku()
    {
        $buku = Buku::with('rak')->orderBy('nama_buku')->get();
        return view('buku', compact('buku'));
    }

    public function buku_baru()
    {
        $buku = Buku::with('rak')->latest()->limit(10)->get();
        return view('buku', compact('buku'));
    }

    public function request_buku()
    {
        return view('request_buku');
    }

    public function request_buku_store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'sekolah' => 'required|string|max:255',
            'judul_buku' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
        ]);

        RequestBuku::create($validated);

        return redirect()->route('home.request_buku')->with('success', 'Request buku berhasil dikirim!');
    }

    public function cari(Request $request)
    {
        $random = Buku::with('rak')->inRandomOrder()->limit(5)->get();
        $buku = Buku::with('rak')->where('nama_buku', 'LIKE', '%' . $request->buku . '%')->get();

        return view('buku_cari', compact('buku', 'random'));
    }

    public function layanan()
    {
        $about = TentangKami::find(1);
        $layanan = Layanan::latest()->get();

        return view('layanan', compact('about', 'layanan'));
    }

    public function detail_buku($id)
    {
        $buku = Buku::with('rak')->findOrFail($id);
        return view('detail_buku', compact('buku'));
    }

    public function artikel()
    {
        $artikel = Article::latest()->paginate(5);
        return view('artikel', compact('artikel'));
    }

    public function detail_artikel($slug)
    {
        $artikel = Article::where('slug', $slug)->firstOrFail();
        $previous = Article::where('created_at', '<', $artikel->created_at)->latest()->first();
        $next = Article::where('created_at', '>', $artikel->created_at)->oldest()->first();

        return view('detail_artikel', compact('artikel', 'previous', 'next'));
    }

    public function request_anggota()
    {
        return view('request_anggota');
    }

    public function request_anggota_store(Request $request)
    {
        // Validate request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|unique:request_anggota',
            'unit' => 'required|string',
            'pekerjaan' => 'required|string',
            'no_hp' => 'required|numeric',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('foto_request_anggota'), $filename);
            $validated['foto'] = 'foto_request_anggota/' . $filename;
        }

        RequestAnggota::create($validated);

        return redirect()->back()->with('success', 'Request anggota berhasil dikirim.');
    }

    public function video()
    {
        $galeri = Galeri::where('jenis_media', 'video')->latest()->paginate(5);

        $galeri->getCollection()->transform(function ($item) {
            $item->first_file = is_array($item->file) && count($item->file) > 0 ? $item->file[0] : null;
            return $item;
        });

        return view('video', compact('galeri'));
    }

    public function foto()
    {
        $galeri = Galeri::where('jenis_media', 'foto')->latest()->paginate(5);

        $galeri->getCollection()->transform(function ($item) {
            $item->first_file = is_array($item->file) && count($item->file) > 0 ? $item->file[0] : null;
            return $item;
        });

        return view('foto', compact('galeri'));
    }

    public function detail_foto($slug)
    {
        $galeri = Galeri::where('slug', $slug)->where('jenis_media', 'foto')->firstOrFail();
        $previous = Galeri::where('created_at', '<', $galeri->created_at)->where('jenis_media', 'foto')->latest()->first();
        $next = Galeri::where('created_at', '>', $galeri->created_at)->where('jenis_media', 'foto')->oldest()->first();

        return view('detail_foto', compact('galeri', 'previous', 'next'));
    }
}
