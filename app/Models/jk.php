<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jk extends Model
{
    use HasFactory;
    protected $table        = "jks";
    protected $primarykey   = "id_jkel";
    protected $fillable     = [ 'id_jkel', 'jk'];
}
