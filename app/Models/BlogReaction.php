<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogReaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'session_id',
        'reaction_type'
    ];

    public function post()
    {
        return $this->belongsTo(BlogPosts::class, 'post_id');
    }
} 