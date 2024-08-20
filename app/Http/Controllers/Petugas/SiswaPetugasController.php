<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Sekolah;
use App\Models\Siswa;
use App\Models\TentangKami;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class SiswaPetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::join('kelas', 'kelas.id_kelas', '=', 'siswa.kelas')
            ->join('sekolah', 'sekolah.id_sekolah', '=', 'siswa.sekolah')
            ->select('siswa.*', 'kelas.jenis_kelas', 'sekolah.jenis_sekolah')
            ->orderBy('siswa.nama_siswa', 'asc')
            ->get();
        return view('petugas.siswa.siswa', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::orderBy('jenis_kelas', 'ASC')->get();
        $sekolah = Sekolah::orderBy('jenis_sekolah', 'ASC')->get();
        return view('petugas.siswa.siswa_store', compact(['kelas'], ['sekolah']));
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
            'nis' => 'unique:siswa,nis',
            'nama_siswa' => 'required',
            'tgl_lahir' => 'required|date',
            'jk' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'kelas' => 'required',
            'sekolah' => 'required',
            'foto' => 'required',
        ]);

        // $barcode = rand(1, 999999999);
        $kode = IdGenerator::generate(['table' => 'siswa', 'field' => 'barcode', 'length' => 8, 'prefix' => date('ymd')]);
        $barcode = $kode;

        if ($request->nis == NULL) {
            Siswa::create([
                'nis' => $barcode,
                'barcode' => $barcode,
                'nama_siswa' => $request->nama_siswa,
                'jenis_kelamin' => $request->jk,
                'tgl_lahir' => $request->tgl_lahir,
                'alamat' => $request->alamat,
                'telp' => $request->telp,
                'kelas' => $request->kelas,
                'sekolah' => $request->sekolah,
                'foto' => ''
            ]);

            return to_route('siswa.index')->with('success', 'Berhasil Menambahkan Anggota Baru');
        }

        if ($request->hasFile('foto')) {
            $foto_profile = $request->file('foto')->getClientOriginalName();
            $request->foto->move(public_path('foto_siswa'), $foto_profile);
        }

        Siswa::create([
            'nis' => $request->nis,
            'barcode' => $barcode,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jk,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'kelas' => $request->kelas,
            'sekolah' => $request->sekolah,
            'foto' => $foto_profile
        ]);

        return to_route('siswa.index')->with('success', 'Berhasil Menambahkan Anggota Baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $tentang_kami = TentangKami::where('id_tentang_kami', '=', '1')->first();
        $siswa = Siswa::join('kelas', 'kelas.id_kelas', '=', 'siswa.kelas')
            ->select('siswa.*', 'kelas.jenis_kelas')
            ->find($id);

        // $siswa = Siswa::find($id);

        return view('petugas.siswa.siswa_cetak', compact(['siswa', 'tentang_kami']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        $kelas = Kelas::orderBy('jenis_kelas', 'ASC')->get();
        $sekolah = Sekolah::orderBy('jenis_sekolah', 'ASC')->get();
        return view('petugas.siswa.siswa_edit', compact(['siswa', 'kelas', 'sekolah']));
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
        $request->validate([
            'nis' => 'required',
            'nama_siswa' => 'required',
            'tgl_lahir' => 'required|date',
            'jk' => 'required',
            'kelas' => 'required',
            'sekolah' => 'required',
            'alamat' => 'required',
            // 'telp' => 'required',
        ]);

        if ($request->foto == NULL) {
            Siswa::find($id)->update([
                'nis' => $request->nis,
                'nama_siswa' => $request->nama_siswa,
                'jenis_kelamin' => $request->jk,
                'tgl_lahir' => $request->tgl_lahir,
                'alamat' => $request->alamat,
                'telp' => $request->telp,
                'kelas' => $request->kelas,
                'sekolah' => $request->sekolah,
            ]);

            return to_route('siswa.index')->with('success', 'Berhasil Memperbaharui Anggota');
        }

        if ($request->hasFile('foto')) {
            $foto_profile = $request->file('foto')->getClientOriginalName();
            $request->foto->move(public_path('foto_siswa'), $foto_profile);
        }

        Siswa::find($id)->update([
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jk,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'kelas' => $request->kelas,
            'foto' => $foto_profile,
            'sekolah' => $request->sekolah,
        ]);

        return to_route('siswa.index')->with('success', 'Berhasil Memperbaharui Anggota');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Siswa::find($id)->delete();
        return back()->with('success', 'Berhasil Mengapus Anggota');
    }
}