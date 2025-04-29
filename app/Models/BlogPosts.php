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
            return asset('landing_pages/assets/img/blog-placeholder.jpg');
        }

        $imagePath = $this->featured_image;
        // Remove any leading slashes
        $imagePath = ltrim($imagePath, '/');

        // Check if the path is already a full URL
        if (filter_var($imagePath, FILTER_VALIDATE_URL)) {
            return $imagePath;
        }

        // If the path starts with 'storage/'
        if (strpos($imagePath, 'storage/') === 0) {
            return asset($imagePath);
        }

        // If the path contains 'files/' but doesn't start with 'storage/'
        if (strpos($imagePath, 'files/') === 0) {
            return asset('storage/' . $imagePath);
        }

        // If it's just a filename, assume it's in the files directory
        return asset('storage/files/' . basename($imagePath));
    }
}
