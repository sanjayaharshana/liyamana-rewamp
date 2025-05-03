<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'status',
        'user_id',
        'seo_description'
    ];

    // Cast JSON fields to arrays
    protected $casts = [
        'category_ids' => 'json',
        'tags' => 'json',
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
        if (empty($this->featured_image)) {
            \Log::info('Blog post #' . $this->id . ': No featured image set');
            return asset('landing_pages/assets/img/blog-placeholder.jpg');
        }

        // If it's already a full URL, return it
        if (filter_var($this->featured_image, FILTER_VALIDATE_URL)) {
            \Log::info('Blog post #' . $this->id . ': Using full URL: ' . $this->featured_image);
            return $this->featured_image;
        }

        // Clean the path
        $imagePath = str_replace('\\', '/', $this->featured_image);
        $imagePath = ltrim($imagePath, '/');

        // Log the original and cleaned path
        \Log::info('Blog post #' . $this->id . ': Original path: ' . $this->featured_image);
        \Log::info('Blog post #' . $this->id . ': Cleaned path: ' . $imagePath);

        // Check if file exists in storage
        $storagePath = storage_path('app/public/' . $imagePath);
        if (file_exists($storagePath)) {
            $url = asset('storage/' . $imagePath);
            \Log::info('Blog post #' . $this->id . ': File exists in storage: ' . $url);
            return $url;
        }

        // Check if file exists in public storage
        $publicPath = public_path('storage/' . $imagePath);
        if (file_exists($publicPath)) {
            $url = asset('storage/' . $imagePath);
            \Log::info('Blog post #' . $this->id . ': File exists in public storage: ' . $url);
            return $url;
        }

        // If file doesn't exist, try to find it in the files directory
        $filesPath = storage_path('app/public/files/' . basename($imagePath));
        if (file_exists($filesPath)) {
            $url = asset('storage/files/' . basename($imagePath));
            \Log::info('Blog post #' . $this->id . ': File exists in files directory: ' . $url);
            return $url;
        }

        // If all else fails, return placeholder
        \Log::warning('Blog post #' . $this->id . ': Image not found in any location');
        return asset('landing_pages/assets/img/blog-placeholder.jpg');
    }
}
