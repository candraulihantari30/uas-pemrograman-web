<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tempekan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_anggota', 'nama', 'jabatan', 
        'periode',  'nam_tem', 'tem_bag', 'ket'        
    ];
}
