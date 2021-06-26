<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status_kk extends Model
{
    use HasFactory;
    protected $table        = "status_kks";
    protected $primarykey   = "id_sta";
    protected $fillable     = [ 'id_sta', 'status_kk'];
}
