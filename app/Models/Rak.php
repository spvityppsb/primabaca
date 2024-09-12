<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    use HasFactory;
    protected $table = 'rak';
    protected $primaryKey = 'id_rak';
    protected $fillable = [
        'jenis_rak'
    ];


    public function bukus()
    {
        return $this->hasMany(Buku::class, 'rak', 'id_rak');
    }
}
