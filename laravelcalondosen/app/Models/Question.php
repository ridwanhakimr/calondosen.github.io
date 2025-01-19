<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'category', 'user_id'];

    public function user()
    {
        return $this->belongsTo(Login::class, 'user_id', 'id_user');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'question_id');
    }
}
