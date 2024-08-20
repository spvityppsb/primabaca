<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;

class SiswaExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Siswa::join('kelas', 'kelas.id_kelas', '=', 'siswa.kelas')
            ->join('sekolah', 'sekolah.id_sekolah', '=', 'siswa.sekolah')
            ->select('siswa.nis', 'siswa.nama_siswa', 'siswa.jenis_kelamin', 'kelas.jenis_kelas', 'sekolah.jenis_sekolah', 'siswa.alamat', 'siswa.telp')
            ->orderBy('siswa.nama_siswa', 'asc')
            ->get();
    }
}
