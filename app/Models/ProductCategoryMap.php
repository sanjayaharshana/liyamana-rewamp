<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Templetes;
class ProductCategoryMap extends Model
{
    use HasFactory;

    public function template()
    {
        return $this->belongsTo(Templetes::class, 'templete_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(TempleteCategories::class, 'category_id', 'id');
    }

}
