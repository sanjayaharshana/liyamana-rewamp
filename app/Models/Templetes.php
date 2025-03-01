<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TempleteCategories;
use App\Models\User;

class Templetes extends Model
{
    use HasFactory;

    protected $fillable = [
        'feature_image',
    ];

    protected $casts = [
      'images' => 'array',
      'tags' => 'array',
      'category_ids' => 'array',
      'layouts' => 'array'
    ];


    public function category()
    {
        return $this->belongsTo(TempleteCategories::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function setPicturesAttribute($pictures)
    {
        if (is_array($pictures)) {
            $this->attributes['images'] = json_encode($pictures);
        }
    }

    public function getPicturesAttribute($pictures)
    {
        return json_decode($pictures, true);
    }

    public function templateimages()
    {
        return $this->hasMany(TemplateImages::class);
    }
}
