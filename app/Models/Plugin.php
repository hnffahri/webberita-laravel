<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plugin extends Model
{
    use HasFactory;
    protected $table = "plugin";
    protected $fillable = ['google_analitycs','facebook_pixel'];
}
