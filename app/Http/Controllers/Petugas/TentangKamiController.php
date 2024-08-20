<?php

namespace App\Http\Controllers\petugas;

use App\Http\Controllers\Controller;
use App\Models\TentangKami;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TentangKamiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tentang_kami = TentangKami::where('id_tentang_kami', '=', '1')->first();
        return view('petugas.tentang-kami.index', compact(['tentang_kami']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('petugas.tentang-kami.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'profil' => 'required|',
            'visi' => 'required|',
            'misi' => 'required|',
            'alamat' => 'required|',
            'email' => 'required|',
            'telepon' => 'required|',
            'maps' => 'required|',
            'jam_buka_1' => 'required',
            'jam_buka_2' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png|max:20480',
            'foto_visi' => 'required|mimes:jpg,jpeg,png|max:20480',
        ]);
        $file  = $request->file('foto');
        $validatedData['name'] = $file->getClientOriginalName();
        if ($request->file('foto')) {
            $validatedData['foto'] =  $file->storeAs("foto_tentang_kami",  $validatedData['name']);
        }
        $file_foto_visi  = $request->file('foto_visi');
        $validatedData['name_foto_visi'] = $file_foto_visi->getClientOriginalName();
        if ($request->file('foto_visi')) {
            $validatedData['foto_visi'] =  $file_foto_visi->storeAs("foto_tentang_kami",  $validatedData['name_foto_visi']);
        }
        TentangKami::create($validatedData);
        return to_route('tentang-kami.index')->with('success', 'Berhasil Menambahkan Data Baru');
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
        //
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
            'profil' => 'required|',
            'visi' => 'required|',
            'misi' => 'required|',
            'alamat' => 'required|',
            'email' => 'required|',
            'telepon' => 'required|',
            'maps' => 'required|',
            'jam_buka_1' => 'required',
            'jam_buka_2' => 'required',
            'foto' => 'mimes:jpg,jpeg,png|max:20480',
            'foto_visi' => 'required|mimes:jpg,jpeg,png|max:20480',
        ]);
        if ($request->hasFile('foto')) {
            $file  = $request->file('foto');
            $foto_name = $file->getClientOriginalName();
            if ($request->file('foto')) {
                Storage::delete($request->oldImage);
                $validatedData['foto'] =  $file->storeAs("foto_tentang_kami",  $foto_name);
            }
        }
        if ($request->hasFile('foto_visi')) {
            $file_foto_visi  = $request->file('foto_visi');
            $foto_visi_name = $file_foto_visi->getClientOriginalName();
            if ($request->file('foto_visi')) {
                Storage::delete($request->oldImageVisi);
                $validatedData['foto_visi'] =  $file_foto_visi->storeAs("foto_tentang_kami",  $foto_visi_name);
            }
        }
        TentangKami::where('id_tentang_kami', $id)
            ->update($validatedData);
        return to_route('tentang-kami.index')->with('success', 'Berhasil Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
