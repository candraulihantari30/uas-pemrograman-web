<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nam_tem extends Model
{
    use HasFactory;
    protected $table        = "nam_tems";
    protected $primarykey   = "id_nam";
    protected $fillable     = [ 'id_nam', 'nam_tem'];
}
