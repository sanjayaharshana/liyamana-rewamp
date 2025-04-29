<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempleteCategories extends Model
{
    use HasFactory;

    // Add this line to specify the table name
    protected $table = 'templete_categories';

    // Add fillable properties
    protected $fillable = [
        'category_name',
        'slug',
        'icon',
        'image',
        'category_description',
        'seo_description',
        'status'
    ];

    // Keep your existing relationship
    public function templates()
    {
        return $this->hasMany(Templetes::class, 'category_id');
    }
}
