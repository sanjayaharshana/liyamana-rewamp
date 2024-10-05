<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPosts extends Model
{
    use HasFactory;

    protected $casts = [
        'category_ids' => 'array',
        'user_id' => 'array',
    ];
}
