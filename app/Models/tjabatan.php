<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tjabatan extends Model
{
    use HasFactory;
    protected $table        = "tjabatans";
    protected $primarykey   = " id_jb";
    protected $fillable     = [ ' id_jb', 'jabatan'];
}
