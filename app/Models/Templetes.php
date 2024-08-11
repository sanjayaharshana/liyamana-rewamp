<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TempleteCategories;
use App\Models\User;

class Templetes extends Model
{
    use HasFactory;


    public function category()
    {
        return $this->belongsTo(TempleteCategories::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
