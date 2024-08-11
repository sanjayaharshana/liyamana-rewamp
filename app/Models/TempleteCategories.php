<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempleteCategories extends Model
{
    use HasFactory;

    public function templates()
    {
        return $this->hasMany(Templetes::class, 'category_id');
    }
}
