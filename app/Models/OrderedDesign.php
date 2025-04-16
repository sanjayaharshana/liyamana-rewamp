<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderedDesign extends Model
{
    use HasFactory;
    protected $casts =[
        'order_details' => 'json',
        'address' => 'json',
        'design' => 'json',
        'field_details' => 'json'
    ];

}
