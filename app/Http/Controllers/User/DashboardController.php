<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('user.dashboard');
    }
    public function __construct()
    {
        $this->middleware('auth');
    }

}
