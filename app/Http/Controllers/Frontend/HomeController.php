<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Templetes;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $mostPopularTemplates = Templetes::latest()->take(8)
            ->get();
        return view('landing.home',[
            'mostPopularTemplates' => $mostPopularTemplates,
        ]);
    }

    public function offline()
    {
        return view('landing.offline');
    }

    public function searchTemplates(Request $request)
    {
        $query = $request->get('query');
        
        $templates = Templetes::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->take(5)
            ->get(['id', 'name', 'description', 'feature_image', 'slug'])
            ->map(function($template) {
                return [
                    'id' => $template->id,
                    'name' => $template->name,
                    'description' => \Illuminate\Support\Str::limit($template->description, 50),
                    'feature_image' => asset('storage/' . $template->feature_image),
                    'slug' => $template->slug
                ];
            });

        return response()->json($templates);
    }
}
