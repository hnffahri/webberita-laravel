<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bantuan extends Model
{
    use HasFactory;
    protected $table = "bantuan";
    protected $fillable = ['judul','slug','ringkas','isi','img','status','views','keyword', 'created_at'];
}
