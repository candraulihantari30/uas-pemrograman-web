<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tpekerjaan extends Model
{
    use HasFactory;
    protected $table        = "tpekerjaans";
    protected $primarykey   = "id_peker";
    protected $fillable     = [ 'id_peker', 'pekerjaan'];
}
