<?php

namespace App\Http\Controllers;
use App\Models\Order;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('customer')->get();
    
        return view('admin.order', compact('orders'));
    }

    public function approve($id)
{
    $order = Order::findOrFail($id);
    $order->status = 'completed';
    $order->save();

    return redirect()->back()->with('success', 'Order approved successfully.');
}

        
}
