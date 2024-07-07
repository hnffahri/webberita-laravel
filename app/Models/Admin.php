<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;

class Admin extends Authenticatable
{
    use HasFactory,Notifiable;

    protected $table = 'admin';

    protected $fillable = [
        'name', 'username', 'email', 'password', 'role', 'provinsi', 'kota', 'biografi', 'alamat','facebook','instagram','xtwitter','youtube',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // relasi eloquen
    public function konten()
    {
        return $this->hasMany(Konten::class);
    }
    
    // Relasi ke provinsi berdasarkan kode
    public function province()
    {
        return $this->belongsTo(Province::class, 'provinsi', 'code');
    }

    // Relasi ke kota berdasarkan kode
    public function city()
    {
        return $this->belongsTo(City::class, 'kota', 'code');
    }
}
