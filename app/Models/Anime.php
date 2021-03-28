<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'genre', 'link', 'status', 'motivasi', 'score', 'email', 'sinopsis', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
