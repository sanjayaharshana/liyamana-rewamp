<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BlogPosts extends Model
{
    use HasFactory;

    protected $table = 'blog_posts';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'featured_image',
        'category_ids',
        'tags',
        'is_featured',
        'views',
        'likes',
        'dislikes',
        'status',
        'user_id',
        'seo_description'
    ];

    // Cast JSON fields to arrays
     protected $casts = [
        'category_ids' => 'array',
        'tags' => 'array',
        'is_featured' => 'boolean',
    ];

    // Allow dynamic properties
    protected $appends = ['category_names', 'featured_image_url'];

    // Getter for category_names
    public function getCategoryNamesAttribute()
    {
        return $this->attributes['category_names'] ?? [];
    }

    // Setter for category_names
    public function setCategoryNamesAttribute($value)
    {
        $this->attributes['category_names'] = $value;
    }

    // Mutator for category_ids to ensure it's properly formatted
    public function setCategoryIdsAttribute($value)
    {
        $this->attributes['category_ids'] = is_array($value) ? json_encode($value) : $value;
    }

    // Mutator for tags to ensure it's properly formatted
    public function setTagsAttribute($value)
    {
        if (is_string($value) && !empty($value)) {
            // If tags are provided as a string, convert to array
            $tags = explode(',', $value);
            $tags = array_map('trim', $tags);
            $this->attributes['tags'] = json_encode($tags);
        } else if (is_array($value)) {
            $this->attributes['tags'] = json_encode($value);
        } else {
            $this->attributes['tags'] = null;
        }
    }

    // Get the URL for the featured image
    public function getFeaturedImageUrlAttribute()
    {
        if ($this->featured_image) {
            return asset('storage/' . $this->featured_image);
        }
        return asset('landing_pages/assets/img/blog-placeholder.jpg');
    }

    // Add this method to help with debugging
    public static function findBySlug($slug)
    {
        $post = self::where('slug', $slug)->first();
        \Log::info('Looking up post by slug: ' . $slug . ', found: ' . ($post ? 'yes' : 'no'));
        return $post;
    }

     /**
     * Get the author of the post.
     */
    public function author()
    {
        return $this->belongsTo(Administrator::class, 'author_id');
    }

    /**
     * Get the comments for the blog post.
     */
    public function comments()
    {
        return $this->hasMany(BlogComment::class, 'post_id');
    }

    /**
     * Get approved comments for the blog post.
     */
    public function approvedComments()
    {
        return $this->hasMany(BlogComment::class, 'post_id')
            ->where('status', 1)
            ->orderBy('created_at', 'desc');
    }

    /**
     * Get the views for the blog post.
     */
    public function views()
    {
        return $this->hasMany(BlogView::class, 'post_id');
    }

    /**
     * Record a view for this post.
     */
    public function recordView($sessionId, $ipAddress = null, $userAgent = null)
    {
        try {
            // Start a database transaction
            DB::beginTransaction();

            // Create a new view record
            $view = $this->views()->create([
                'session_id' => $sessionId,
                'ip_address' => $ipAddress,
                'user_agent' => $userAgent,
                'viewed_at' => now()
            ]);

            // Increment the views counter using a direct update to avoid race conditions
            DB::table('blog_posts')
                ->where('id', $this->id)
                ->update(['views' => DB::raw('views + 1')]);

            // Commit the transaction
            DB::commit();

            // Refresh the model to get the updated view count
            $this->refresh();
            
            // Log successful view recording
            \Log::info("View recorded for post #{$this->id} by session {$sessionId}. New view count: {$this->views}");
            return true;
        } catch (\Exception $e) {
            // Rollback the transaction on error
            DB::rollBack();
            
            // Log any errors
            \Log::error("Error recording view for post #{$this->id}: " . $e->getMessage());
            return false;
        }
    }

    // Relationship with reactions
    public function reactions()
    {
        return $this->hasMany(BlogReaction::class, 'post_id');
    }
}
