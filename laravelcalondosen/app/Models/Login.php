<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;

    protected $table = 'tb_login';
    protected $primaryKey = 'id_user';

    protected $fillable = [
        'username',
        'password',
        'email',
        'nama_lengkap',
        'role',
    ];
    public $timestamps = false;
}
