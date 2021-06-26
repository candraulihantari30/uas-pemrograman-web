<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keterangan extends Model
{
    use HasFactory;
    protected $table        = "keterangans";
    protected $primarykey   = "id_keter";
    protected $fillable     = [ 'id_keter', 'keterangan'];
}
