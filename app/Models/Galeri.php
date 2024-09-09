<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_media',
        'slug',
        'jenis_media',
        'file',
        'publish',
    ];

    protected $casts = [
        'file' => 'array', // to handle JSON file array
    ];
}