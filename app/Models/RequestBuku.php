<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestBuku extends Model
{
    use HasFactory;

    protected $table = 'requests_buku';

    protected $fillable = [
        'nama',
        'sekolah',
        'judul_buku',
        'pengarang',
        'penerbit'
    ];
}
