<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'article';
    protected $primaryKey = 'id_artikel';
    protected $fillable = [
        'judul',
        'foto',
        'slug',
        'deskripsi',
        'created_by'
    ];
}