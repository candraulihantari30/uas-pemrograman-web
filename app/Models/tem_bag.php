<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tem_bag extends Model
{
    use HasFactory;
    protected $table        = "tem_bags";
    protected $primarykey   = "iid_tem";
    protected $fillable     = [ 'id_tem', 'tem_bag'];
}
