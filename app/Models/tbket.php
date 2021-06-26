<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbket extends Model
{
    use HasFactory;
    protected $table        = "tbkets";
    protected $primarykey   = "id_ket";
    protected $fillable     = [ 'id_ket', 'ket'];
}
