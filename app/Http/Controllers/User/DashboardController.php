<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\OrderedDesign;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $pendingOrders = OrderedDesign::where('user_id', auth()->id())
                                    ->where('status', 'pending')
                                    ->get();
        return view('user.dashboard', compact('pendingOrders'));
    }

    public function paymentHistory()
    {
        $orders = OrderedDesign::where('user_id', auth()->id())
                              ->orderBy('created_at', 'desc')
                              ->get();
        return view('user.payment-history', compact('orders'));
    }
}
