<?php

namespace App\Http\Controllers\petugas;

use App\Http\Controllers\Controller;
use App\Models\Riwayat;
use App\Exports\SiswaExport;
use App\Exports\BukuExport;
use App\Imports\BukuImport;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\TentangKami;
use Illuminate\Http\Request;
use PDF;

class LaporanPetugasController extends Controller
{
    public function index()
    {
        $riwayat = Riwayat::join('siswa', 'siswa.id_siswa', '=', 'riwayat_pinjam.id_siswa')
            ->join('kelas', 'kelas.id_kelas', '=', 'siswa.kelas')
            ->join('buku', 'buku.id_buku', '=', 'riwayat_pinjam.id_buku')
            ->select('riwayat_pinjam.*', 'buku.nama_buku', 'buku.kode_buku', 'buku.foto_buku', 'siswa.nis', 'siswa.nama_siswa', 'kelas.jenis_kelas')
            ->latest()
            ->get();

        return view('petugas.laporan.laporan', compact(['riwayat']));
    }

    public function cetak_pdf()
    {
        $tentang_kami = TentangKami::where('id_tentang_kami', '=', '1')->first();
        $riwayat = Riwayat::join('siswa', 'siswa.id_siswa', '=', 'riwayat_pinjam.id_siswa')
            ->join('kelas', 'kelas.id_kelas', '=', 'siswa.kelas')
            ->join('buku', 'buku.id_buku', '=', 'riwayat_pinjam.id_buku')
            ->select('riwayat_pinjam.*', 'buku.nama_buku', 'buku.kode_buku', 'buku.foto_buku', 'siswa.nis', 'siswa.nama_siswa', 'kelas.jenis_kelas')
            ->latest()
            ->get();

        $pdf = PDF::loadview('petugas.laporan.print_laporan_all', ['riwayat' => $riwayat], ['tentang_kami' => $tentang_kami]);

        return $pdf->stream();
    }

    public function cari_laporan(Request $request)
    {
        $data = explode(' - ', $request->daterange);

        $startDate = date('Y-m-d', strtotime($data[0]));
        $endDate = date('Y-m-d', strtotime($data[1]));

        $riwayat = Riwayat::join('siswa', 'siswa.id_siswa', '=', 'riwayat_pinjam.id_siswa')
            ->join('kelas', 'kelas.id_kelas', '=', 'siswa.kelas')
            ->join('buku', 'buku.id_buku', '=', 'riwayat_pinjam.id_buku')
            ->select('riwayat_pinjam.*', 'buku.nama_buku', 'buku.kode_buku', 'buku.foto_buku', 'siswa.nis', 'siswa.nama_siswa', 'kelas.jenis_kelas')
            ->whereBetween('riwayat_pinjam.tanggal_kembali', [$startDate, $endDate])
            ->get();

        $pdf = PDF::loadview('petugas.laporan.print_laporan_all', ['riwayat' => $riwayat]);
        return $pdf->stream();
    }

    public function anggota_excel()
    {
        return Excel::download(
            new SiswaExport,
            'siswa.xlsx',
            \Maatwebsite\Excel\Excel::XLSX
        );
    }
    public function anggota_pdf()
    {
        return Excel::download(new SiswaExport, 'siswa.pdf', \Maatwebsite\Excel\Excel::MPDF);
    }
    public function import_anggota_excel(Request $request)
    {
        // validasi
        $file = $request->file('file');
        $nama_file = rand() . $file->getClientOriginalName();
        // $file->move(public_path('file_anggota'), $nama_file);
        $file->move('file_anggota', $nama_file);
        // ddd($file);
        Excel::import(
            new SiswaImport,
            public_path('/file_anggota/' . $nama_file)
        );
        return to_route('siswa.index')->with('success', 'Berhasil Import Buku');
    }

    public function buku_excel()
    {
        return Excel::download(
            new BukuExport,
            'buku.xlsx',
            \Maatwebsite\Excel\Excel::XLSX
        );
    }
    public function import_buku_excel(Request $request)
    {
        // validasi
        $file = $request->file('file');
        $nama_file = rand() . $file->getClientOriginalName();
        // $file->move(public_path('file_anggota'), $nama_file);
        $file->move('file_buku', $nama_file);
        // ddd($file);
        Excel::import(
            new BukuImport,
            public_path('/file_buku/' . $nama_file)
        );
        return to_route('buku.index')->with('success', 'Berhasil Import Buku');
    }
}
