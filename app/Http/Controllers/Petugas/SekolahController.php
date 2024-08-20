<?php

namespace App\Http\Controllers\petugas;

use App\Http\Controllers\Controller;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sekolah = Sekolah::orderBy('jenis_sekolah', 'ASC')->paginate(8);
        return view('petugas.sekolah.index', compact(['sekolah']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis_sekolah' => 'unique:sekolah,jenis_sekolah'
        ]);

        if ($validator->fails()) {
            return back()->with('fail', 'Instansi Telah Ada Mohon Cek Ulang');
        }

        Sekolah::create([
            'jenis_sekolah' => $request->jenis_sekolah,
        ]);

        return back()->with('success', 'Berhasil Menambahkan Instansi Baru');
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
        Sekolah::find($id)->update([
            'jenis_sekolah' => $request->jenis_sekolah
        ]);

        return back()->with('success', 'Berhasil Perbaharui Instansi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sekolah::find($id)->delete();

        return back()->with('success', 'Berhasil Menghapus Instansi');
    }
}
