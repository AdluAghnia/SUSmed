<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        "image",
        "caption",
        "user_id",
    ];

    // return owner of this post
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
