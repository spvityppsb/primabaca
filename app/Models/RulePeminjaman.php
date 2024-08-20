<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RulePeminjaman extends Model
{
    use HasFactory;

    protected $table = 'tata_peminjaman';
    protected $primaryKey = 'id_tata_peminjaman';
    protected $fillable = [
        'keterangan'
    ];
}
