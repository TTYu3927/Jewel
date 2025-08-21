<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    // Show all orders (Admin)
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

    public function store(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $order = Order::create([
                    'user_id' => auth()->id(),
                    'total'   => $request->total,
                    'status'  => 'pending',
                ]);

                foreach (session('cart', []) as $id => $item) {
                    if (isset($item['id']) && str_starts_with($item['id'], 'giftcard_')) continue;
                    
                    $product = Product::where('id', $id)->lockForUpdate()->firstOrFail();

                    if ($item['quantity'] > $product->stock_qty) {
                        throw new \Exception("Only {$product->stock_qty} left for {$product->product_name}");
                    }

                    OrderItem::create([
                        'order_id'   => $order->id,
                        'product_id' => $product->id,
                        'quantity'   => $item['quantity'],
                        'price'      => $product->sale_price,
                    ]);

                    $product->decrement('stock_qty', $item['quantity']);
                }

                session()->forget('cart');
            });

            return redirect()->route('orders.index')->with('success', 'Order placed successfully!');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    
}
