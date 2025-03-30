<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\Request;

class MarketPlaceController extends Controller
{
    public function quickView($id)
    {
        try {
            $template = Template::findOrFail($id);
            
            return response()->json([
                'id' => $template->id,
                'name' => $template->name,
                'slug' => $template->slug,
                'feature_image' => url('storage/' . $template->feature_image),
                'image2' => $template->image2 ? url('storage/' . $template->image2) : null,
                'image3' => $template->image3 ? url('storage/' . $template->image3) : null,
                'price' => $template->price,
                'discount' => $template->discount,
                'description' => $template->description,
                'category' => $template->category->name ?? 'N/A',
                'seller' => $template->seller->name ?? 'N/A'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Product not found'
            ], 404);
        }
    }
} 