<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RulePengembalian extends Model
{
    use HasFactory;

    protected $table = 'tata_pengembalian';
    protected $primaryKey = 'id_tata_pengembalian';
    protected $fillable = [
        'keterangan'
    ];
}
