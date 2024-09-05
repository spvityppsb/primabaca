<?php

namespace App\Http\Controllers\petugas;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Rak;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class BukuPetugasController extends Controller
{
    public function index()
    {
        $buku = Buku::join('rak', 'rak.id_rak', '=', 'buku.rak')
            ->select('buku.*', 'rak.jenis_rak')
            ->orderBy('buku.nama_buku', 'ASC')
            ->get();

        return view('petugas.buku.buku', compact('buku'));
    }

    public function create()
    {
        $rak = Rak::orderBy('jenis_rak', 'ASC')->get();
        return view('petugas.buku.buku_store', compact('rak'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_buku' => 'required|unique:buku,nama_buku',
            'penerbit' => 'required',
            'rak' => 'required',
            'stok' => 'required',
            'penulis' => 'required',
            'tahun_terbit' => 'required',
            'isbn' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048', // tambah validasi untuk gambar
        ]);

        $kode = IdGenerator::generate(['table' => 'buku', 'field' => 'kode_buku', 'length' => 8, 'prefix' => date('ymd')]);
        $lastKode = 'YP.' . $kode;

        // Upload foto jika ada
        $foto_profile = null;
        if ($request->hasFile('foto')) {
            $foto_profile = time() . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('foto_buku'), $foto_profile);
        }

        Buku::create([
            'kode_buku' => $lastKode,
            'nama_buku' => $request->judul_buku,
            'penerbit' => $request->penerbit,
            'rak' => $request->rak,
            'stok_buku' => $request->stok,
            'isbn' => $request->isbn,
            'penulis' => $request->penulis,
            'tahun_terbit' => $request->tahun_terbit,
            'foto_buku' => $foto_profile,
        ]);

        return redirect()->route('buku.index')->with('success', 'Berhasil Menambahkan Buku Baru');
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id); // Menggunakan findOrFail agar langsung gagal jika tidak ditemukan
        $rak = Rak::orderBy('jenis_rak', 'ASC')->get();

        return view('petugas.buku.buku_edit', compact('buku', 'rak'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_buku' => 'required',
            'penerbit' => 'required',
            'rak' => 'required',
            'stok' => 'required',
            'penulis' => 'required',
            'tahun_terbit' => 'required',
            'isbn' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi untuk gambar opsional
        ]);

        $buku = Buku::findOrFail($id);

        // Cek apakah ada file foto baru yang diunggah
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($buku->foto_buku && file_exists(public_path('foto_buku/' . $buku->foto_buku))) {
                unlink(public_path('foto_buku/' . $buku->foto_buku));
            }

            // Upload foto baru
            $foto_profile = time() . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('foto_buku'), $foto_profile);

            // Simpan nama file foto yang baru
            $buku->foto_buku = $foto_profile;
        }

        // Update data buku
        $buku->update([
            'nama_buku' => $request->judul_buku,
            'penerbit' => $request->penerbit,
            'rak' => $request->rak,
            'stok_buku' => $request->stok,
            'isbn' => $request->isbn,
            'penulis' => $request->penulis,
            'tahun_terbit' => $request->tahun_terbit,
            'foto_buku' => $buku->foto_buku, // Tetap simpan foto lama jika tidak ada yang baru
        ]);

        return redirect()->route('buku.index')->with('success', 'Berhasil Memperbaharui Data Buku');
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);

        // Hapus foto buku jika ada
        if ($buku->foto_buku && file_exists(public_path('foto_buku/' . $buku->foto_buku))) {
            unlink(public_path('foto_buku/' . $buku->foto_buku));
        }

        // Hapus buku dari database
        $buku->delete();

        return redirect()->back()->with('success', 'Berhasil Menghapus Buku');
    }
}