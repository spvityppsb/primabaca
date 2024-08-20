<?php

namespace App\Http\Controllers\petugas;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Rak;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class BukuPetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::join('rak', 'rak.id_rak', '=', 'buku.rak')
            ->select('buku.*', 'rak.jenis_rak')
            ->orderBy('buku.nama_buku', 'ASC')
            ->get();

        return view('petugas.buku.buku', compact(['buku']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rak = Rak::orderBy('jenis_rak', 'ASC')->get();
        return view('petugas.buku.buku_store', compact(['rak']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kode = IdGenerator::generate(['table' => 'buku', 'field' => 'kode_buku', 'length' => 8, 'prefix' => date('ymd')]);
        $lastKode = 'YP.' .  $kode;

        $request->validate([
            'judul_buku' => 'required|unique:buku,nama_buku',
            'penerbit' => 'required',
            'rak' => 'required',
            'stok' => 'required',
            'penulis' => 'required',
            'tahun_terbit' => 'required',
            'isbn' => 'required',
            'foto' => 'required'
        ]);
        if ($request->hasFile('foto')) {
            $foto_profile = $request->file('foto')->getClientOriginalName();
            $request->foto->move(public_path('foto_buku'), $foto_profile);
        }
        Buku::create([
            'kode_buku' => $lastKode,
            'nama_buku' => $request->judul_buku,
            'penerbit' => $request->penerbit,
            'rak' => $request->rak,
            'stok_buku' => $request->stok,
            'isbn' =>  $request->isbn,
            'penulis' => $request->penulis,
            'tahun_terbit' => $request->tahun_terbit,
            'foto_buku' => $foto_profile,
        ]);

        return to_route('buku.index')->with('success', 'Berhasil Menambahkan Buku Baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buku = Buku::find($id);
        $rak = Rak::orderBy('jenis_rak', 'ASC')->get();

        return view('petugas.buku.buku_edit', compact(['buku', 'rak']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     // 'judul_buku' => 'required',
        //     // 'penerbit' => 'required',
        //     // 'rak' => 'required',
        //     // 'stok' => 'required',
        //     // 'penulis' => 'required',
        //     // 'tahun_terbit' => 'required',
        //     // 'isbn' => 'required',
        // ]);

        if ($request->foto == NULL) {
            Buku::find($id)->update([
                'nama_buku' => $request->judul_buku,
                'penerbit' => $request->penerbit,
                'rak' => $request->rak,
                'stok_buku' => $request->stok,
                'isbn' =>  $request->isbn,
                'penulis' => $request->penulis,
                'tahun_terbit' => $request->tahun_terbit,
            ]);

            return to_route('buku.index')->with('success', 'Berhasil Memperbaharui Data Buku');
        }

        if ($request->hasFile('foto')) {
            $foto_profile = $request->file('foto')->getClientOriginalName();
            $request->foto->move(public_path('foto_buku'), $foto_profile);
        }

        Buku::find($id)->update([
            'nama_buku' => $request->judul_buku,
            'penerbit' => $request->penerbit,
            'rak' => $request->rak,
            'stok_buku' => $request->stok,
            'foto_buku' => $foto_profile,
            'isbn' =>  $request->isbn,
            'penulis' => $request->penulis,
            'tahun_terbit' => $request->tahun_terbit,
        ]);

        return to_route('buku.index')->with('success', 'Berhasil Memperbaharui Data Buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Buku::find($id)->delete();

        return back()->with('success', 'Berhasil Menghapus Buku');
    }
}