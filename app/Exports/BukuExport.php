<?php

namespace App\Exports;

use App\Models\Buku;
use Maatwebsite\Excel\Concerns\FromCollection;

class BukuExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return
            Buku::join('rak', 'rak.id_rak', '=', 'buku.rak')
            ->select('buku.kode_buku', 'buku.nama_buku', 'buku.isbn', 'buku.penerbit', 'buku.tahun_terbit', 'rak.jenis_rak', 'stok_buku',)
            ->orderBy('buku.nama_buku', 'ASC')
            ->get();
    }
}
