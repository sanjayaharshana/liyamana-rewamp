<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostCardController extends Controller
{
    public function index()
    {
        return view('landing.post-card');
    }
}
