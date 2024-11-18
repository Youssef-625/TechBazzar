<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Handle the incoming request.
     */

    public function index()
    {
        $totalOrders = Order::count();
        $orders = Order::latest()->take(6)->get();
        $totalUsers = User::where('is_admin','0')->count();
        $totalProducts = Product::count();

        return view('admin.dashboard', compact( 'orders','totalOrders', 'totalUsers', 'totalProducts'));
    }
}
