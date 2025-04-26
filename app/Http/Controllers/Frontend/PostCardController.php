<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Momentos;
use Illuminate\Http\Request;

class PostCardController extends Controller
{
    public function index()
    {
        // Fetch all momentos from the database
        $momentos = Momentos::all();

        return view('landing.post-card', compact('momentos'));
    }
}
