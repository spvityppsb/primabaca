<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestAnggota extends Model
{
    use HasFactory;
    protected $table = 'request_anggota';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'alamat',
        'email',
        'unit',
        'pekerjaan',
        'no_hp',
        'foto',
    ];
}
