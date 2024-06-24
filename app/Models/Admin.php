<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory,Notifiable;

    protected $table = 'admin';

    protected $fillable = [
        'name', 'username', 'email', 'password', 'role', 'provinsi', 'kota', 'biografi', 'alamat',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // relasi eloquen
    public function konten()
    {
        return $this->hasMany(Konten::class);
    }
}
