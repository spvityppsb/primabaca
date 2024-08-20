<?php

namespace App\Imports;

use App\Models\Siswa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {
        return new Siswa([
            'nis' => $row[0],
            'barcode' => $row[0],
            'nama_siswa' => $row[1],
            'jenis_kelamin' => $row[2],
            'kelas' => $row[3],
            'alamat' => $row[4],
            'sekolah' => $row[5],
            'telp' => $row[6],
        ]);
    }
}
