<?php

namespace App\Http\Controllers\petugas;

use App\Http\Controllers\Controller;
use App\Models\Iklan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IklanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iklan = Iklan::orderBy('created_at', 'ASC')->get();
        return view('petugas.iklan.index', compact(['iklan']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('petugas.iklan.store');
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
            'foto' => 'required|mimes:jpg,jpeg,png|max:20480',
            'slug' => 'max:20480',
        ]);
        $file  = $request->file('foto');
        $validatedData['name'] = $file->getClientOriginalName();
        $validatedData['slug'] = Str::slug($request->judul);
        if ($request->file('foto')) {
            $validatedData['foto'] =  $file->storeAs("foto_banner",  $validatedData['name']);
        }
        Iklan::create($validatedData);
        return to_route('iklan.index')->with('success', 'Berhasil Menambahkan Banner Baru');
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

        $iklan = Iklan::find($id);
        return view('petugas.iklan.edit', compact(['iklan']));
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
            'slug' => 'required|',
            'foto' => 'mimes:jpg,jpeg,png|max:20480',
        ]);
        if ($request->hasFile('foto')) {
            $file  = $request->file('foto');
            $foto_name = $file->getClientOriginalName();
            if ($request->file('foto')) {
                Storage::delete($request->oldImage);
                $validatedData['foto'] =  $file->storeAs("foto_tentang_kami",  $foto_name);
            }
        }
        Iklan::where('id_iklan', $id)
            ->update($validatedData);
        return to_route('iklan.index')->with('success', 'Berhasil Update Banner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $iklan = Iklan::find($id);
        if ($iklan->foto) {
            Storage::delete($iklan->foto);
        }
        Iklan::destroy($iklan->id_iklan);
        return to_route('iklan.index')->with('success', 'Berhasil menghapus banner !');
    }
}
