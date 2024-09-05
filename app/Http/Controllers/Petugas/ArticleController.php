<?php

namespace App\Http\Controllers\petugas;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { {
            $article = Article::orderBy('created_at', 'ASC')->get();

            return view('petugas.artikel.artikel', compact(['article']));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('petugas.artikel.artikel_store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|unique:article',
            'deskripsi' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png',
        ]);
        if ($request->hasFile('foto')) {
            $foto_artikel = $request->file('foto')->getClientOriginalName();
            $request->foto->move(public_path('foto_artikel'), $foto_artikel);
        }
        // ddd($request->hasFile('foto'));
        Article::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'slug' => Str::slug($request->judul),
            'created_by' => Auth::user()->name,
            'foto' => $foto_artikel,
        ]);

        return to_route('artikel.index')->with('success', 'Berhasil Menambahkan Artikel Baru');
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
    public function edit($slug)
    {
        $artikel = Article::where('slug', $slug)->first();
        return view('petugas.artikel.artikel_edit', compact(['artikel']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id_artikel)
    {
        // Validasi request
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi foto
        ]);

        // Ambil data artikel berdasarkan id
        $article = Article::find($id_artikel);

        // Jika tidak ada foto yang diunggah, update tanpa mengubah foto
        if ($request->foto == NULL) {
            $article->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'slug' => Str::slug($request->judul),
                'created_by' => Auth::user()->name,
            ]);

            return redirect()->route('artikel.index')->with('success', 'Berhasil Memperbaharui Data Artikel');
        }

        // Jika ada file foto, lakukan update termasuk foto
        if ($request->hasFile('foto')) {
            // Nama file foto dengan waktu untuk menghindari duplikasi
            $foto_artikel = time() . '_' . $request->file('foto')->getClientOriginalName();

            // Pindahkan file ke folder public/foto_artikel
            $request->file('foto')->move(public_path('foto_artikel'), $foto_artikel);

            // Hapus foto lama jika ada (opsional)
            if ($article->foto && file_exists(public_path('foto_artikel/' . $article->foto))) {
                unlink(public_path('foto_artikel/' . $article->foto));
            }

            // Update artikel dengan foto baru
            $article->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'slug' => Str::slug($request->judul),
                'created_by' => Auth::user()->name,
                'foto' => $foto_artikel,
            ]);
        }

        return redirect()->route('artikel.index')->with('success', 'Berhasil Memperbaharui Data Artikel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_artikel)
    {
        // Ambil data artikel berdasarkan ID
        $article = Article::find($id_artikel);

        // Periksa apakah artikel ditemukan
        if (!$article) {
            return redirect()->route('artikel.index')->with('error', 'Artikel tidak ditemukan');
        }

        // Jika artikel memiliki foto, hapus file foto dari folder public/foto_artikel
        if ($article->foto && file_exists(public_path('foto_artikel/' . $article->foto))) {
            unlink(public_path('foto_artikel/' . $article->foto));
        }

        // Hapus artikel dari database
        $article->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('artikel.index')->with('success', 'Berhasil Menghapus Artikel');
    }
}