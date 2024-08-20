<?php

namespace App\Http\Controllers\petugas;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $layanan = Layanan::orderBy('created_at', 'DESC')->get();
        return view('petugas.layanan.index', compact(['layanan']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('petugas.layanan.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ddd($request);
        $validatedData = $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png|max:20480',
            'slug' => 'max:20480',
            'url' => '',
        ]);
        $file  = $request->file('foto');
        $validatedData['name'] = $file->getClientOriginalName();
        $validatedData['slug'] = Str::slug($request->keterangan);
        if ($request->file('foto')) {
            $validatedData['foto'] =  $file->storeAs("foto_layanan",  $validatedData['name']);
        }
        Layanan::create($validatedData);
        return to_route('layanan.index')->with('success', 'Berhasil Menambahkan Layanan Baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $layanan = Layanan::find($id);
        return view('petugas.layanan.edit', compact(['layanan']));
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

        $validatedData = $request->validate([
            'judul' => 'required',
            'slug' => 'max:20480|',
            'keterangan' => 'required',
            'foto' => 'mimes:jpg,jpeg,png|max:20480',
            'url' => '',
        ]);
        if ($request->hasFile('foto')) {
            $file  = $request->file('foto');
            $foto_name = $file->getClientOriginalName();
            if ($request->file('foto')) {
                Storage::delete($request->oldImage);
                $validatedData['foto'] =  $file->storeAs("foto_layanan",  $foto_name);
            }
        }
        $validatedData['slug'] = Str::slug($request->keterangan);
        Layanan::where('id_layanan', $id)
            ->update($validatedData);
        return to_route('layanan.index')->with('success', 'Berhasil Update Layanan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $layanan = Layanan::find($id);
        if ($layanan->foto) {
            Storage::delete($layanan->foto);
        }
        Layanan::destroy($layanan->id_layanan);
        return to_route('layanan.index')->with('success', 'Berhasil menghapus Layanan !');
    }
}
