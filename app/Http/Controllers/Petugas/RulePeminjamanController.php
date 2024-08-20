<?php

namespace App\Http\Controllers\petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RulePeminjaman;
use App\Models\RulePengembalian;
use Illuminate\Support\Facades\Validator;

class RulePeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rule_pengembalian = RulePengembalian::orderBy('id_tata_pengembalian', 'ASC')->paginate(8);
        $rule_peminjaman = RulePeminjaman::orderBy('id_tata_peminjaman', 'ASC')->paginate(8);
        return view('petugas.rules.index', compact(['rule_peminjaman', 'rule_pengembalian']));
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
            'keterangan' => 'unique:tata_peminjaman,keterangan'
        ]);

        if ($validator->fails()) {
            return back()->with('fail', 'Tata Cara Peminjaman Buku Telah Ada Mohon Cek Ulang');
        }

        RulePeminjaman::create([
            'keterangan' => $request->keterangan,
        ]);

        return back()->with('success', 'Berhasil Menambahkan Tata Cara Peminjaman Buku');
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
        RulePeminjaman::find($id)->update([
            'keterangan' => $request->keterangan
        ]);

        return back()->with('success', 'Berhasil Perbaharui Tata Cara Peminjaman Buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RulePeminjaman::find($id)->delete();

        return back()->with('success', 'Berhasil Menghapus Tata Cara Peminjaman Buku');
    }
}
