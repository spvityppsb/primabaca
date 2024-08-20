<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TentangKami extends Model
{

    use HasFactory;

    protected $table = 'tentang_kami';
    protected $primaryKey = 'id_tentang_kami';
    protected $fillable = [
        'profil',
        'visi',
        'misi',
        'alamat',
        'email',
        'telepon',
        'maps',
        'jam_buka_1',
        'jam_buka_2',
        'foto',
        'foto_visi',
    ];
}
