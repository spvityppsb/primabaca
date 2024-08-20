<?php

namespace App\Imports;

use App\Models\Buku;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class BukuImport implements ToModel
{
    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {
        return new Buku([
            'nama_buku' => $row[0],
            'isbn' => $row[1],
            'penerbit' => $row[2],
            'tahun_terbit' => $row[3],
            'rak' => $row[4],
            'penulis' => $row[5],
            'kode_buku' => $row[6],
            'stok' => 1,
        ]);
    }
}
