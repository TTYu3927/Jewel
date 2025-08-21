<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Category;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalRevenue = (float) Order::sum('total_price'); 
        $totalOrders = Order::count();
        $netProfit = $totalRevenue * 0.1;
        $totalCustomers = Customer::count();

        $days = [];
        $dailyOrders = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $days[] = $date;
            $dailyOrders[] = rand(1, 10); 
        }

        $monthlyIncome = [];
        $monthlyProfit = [];
        for ($m = 1; $m <= 12; $m++) {
            $income = rand(5000000, 15000000); 
            $monthlyIncome[] = $income;
            $monthlyProfit[] = $income * 0.1;
        }

        $deviceCounts = [
            'Mobile' => 0,
            'Desktop' => 14,
            'Tablet' => 0,
        ];

        $categoryLabels = ['Earrings','Necklace','Bracelets','Rings'];
        $categoryData = [1,2,2,2];

        return view('admin.dashboard', compact(
            'totalRevenue',
            'totalOrders',
            'netProfit',
            'totalCustomers',
            'days',
            'dailyOrders',
            'monthlyIncome',
            'monthlyProfit',
            'deviceCounts',
            'categoryLabels',
            'categoryData'
        ));
    }
}
