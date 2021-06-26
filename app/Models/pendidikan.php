<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendidikan extends Model
{
    use HasFactory;
    protected $table        = "pendidikans";
    protected $primarykey   = "id_pen";
    protected $fillable     = [ 'id_pen', 'pendidikan'];
}
