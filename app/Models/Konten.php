<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Konten extends Model
{
    use HasFactory;
    protected $table = "konten";
    protected $fillable = ['judul','slug','ringkas','isi','img','vidio','status','views','type','kategori_id','keyword', 'created_at'];

    // relasi eloquen
    public function Admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    // relasi eloquen
    public function Kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }
}
