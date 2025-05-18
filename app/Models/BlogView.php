<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogView extends Model
{
    protected $fillable = [
        'post_id',
        'session_id',
        'ip_address',
        'user_agent',
        'viewed_at'
    ];

    protected $casts = [
        'viewed_at' => 'datetime'
    ];

    // Disable timestamps since we're using viewed_at
    public $timestamps = false;

    public function post()
    {
        return $this->belongsTo(BlogPosts::class, 'post_id');
    }

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        // Add indexes if they don't exist
        static::created(function ($model) {
            try {
                \Schema::table('blog_views', function ($table) {
                    if (!\Schema::hasIndex('blog_views', ['post_id', 'session_id', 'viewed_at'])) {
                        $table->index(['post_id', 'session_id', 'viewed_at']);
                    }
                    if (!\Schema::hasIndex('blog_views', ['session_id', 'viewed_at'])) {
                        $table->index(['session_id', 'viewed_at']);
                    }
                });
            } catch (\Exception $e) {
                \Log::error('Error creating indexes for blog_views: ' . $e->getMessage());
            }
        });
    }
} 