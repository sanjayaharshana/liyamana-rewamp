<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Momentos extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'short_description',
        'description',
        'feature_image',
        'article',
        'taken_by',
        'template_id',
        'user_id',
        'category_ids',
        'theme',
        'configuration',
        'video_links',
        'seo_tags',
        'seo_description',
        'slug'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->name);

            // Ensure slug is unique
            $count = 1;
            $originalSlug = $model->slug;
            while (static::where('slug', $model->slug)->exists()) {
                $model->slug = $originalSlug . '-' . $count++;
            }
        });
    }
}
