<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','nama','nik','no_kk','nik_adat','tempat',
        'tanggal_lahir','id_jk','status_kk','pekerjaan',
        'pendidikan','nam_tem','tem_bag','foto','keterangan'
    ];

}
