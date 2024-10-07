<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateLayoutPositions extends Model
{
    use HasFactory;

    protected $casts = [
      'positions' => 'array'
    ];

    protected $fillable = [
      'layout_id',
      'template_id',
      'field_name',
      'positions',
      'configuration'
    ];
}
