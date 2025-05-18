<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory;

    protected $table = 'blog_comments';

    protected $fillable = [
        'post_id',
        'parent_id',
        'name',
        'email',
        'content',
        'status',
        'session_id'
    ];

    // Get replies to this comment
    public function replies()
    {
        return $this->hasMany(BlogComment::class, 'parent_id', 'id');
    }

    // Get the post this comment belongs to
    public function post()
    {
        return $this->belongsTo(BlogPosts::class, 'post_id');
    }
}
