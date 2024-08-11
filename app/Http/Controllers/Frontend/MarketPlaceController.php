<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MarketPlaceController extends Controller
{
    public function index()
    {
        return view('landing.market-place');
    }

    public function show($slug)
    {
        return view('landing.market-place-single');
    }
}
