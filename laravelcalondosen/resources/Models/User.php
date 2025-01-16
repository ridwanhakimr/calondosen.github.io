<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'tb_login'; // Nama tabel di database
    protected $primaryKey = 'id_user'; // Primary key
    public $timestamps = false; // Nonaktifkan timestamps jika tidak ada kolom created_at & updated_at

    protected $fillable = [
        'username',
        'password',
        'email',
        'nama_lengkap',
    ];
}
