<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // １つの投稿は１人のユーザーに属する
    public function user()
        {
    return $this->belongsTo(User::class);
    }
}

