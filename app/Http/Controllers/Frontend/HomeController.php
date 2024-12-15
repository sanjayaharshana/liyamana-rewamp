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
}
