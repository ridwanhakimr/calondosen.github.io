<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category',
        'video_path',
        'user_id',
        'duration',
    ];

    public function user()
    {
        return $this->belongsTo(Login::class, 'user_id', 'id_user');
    }
}
