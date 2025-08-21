<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Category;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalrevenue = Order::sum('total_amount');
        $totalOrders = Order::count();
        $netProfit = Order::sum('total_amount') * 0.1;
        $totalCustomers = Customer::count();

        $days = [];
        $dailyOrders = [];
        for($i=6; $i>=0; $i--){
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $days[] = $date;
            $dailyOrders[] = Order::whereDate('created_at', $date)->count();
        }

        $categories = Category::withCount('products')->get();

        return view('admin.dashboard', compact(
            'totalrevenue', 'totalOrders', 'netProfit', 'totalCustomers', 'days', 'dailyOrders', 'categories'
        ));
    }
}