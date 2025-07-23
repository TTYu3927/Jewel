<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use Stripe\Stripe;
use Stripe\Charge;

class StripeController extends Controller
{
    public function checkout(Request $request)
    {
            Stripe::setApiKey(config('services.stripe.secret'));
      try {


            // Charge the card
            $charge = Charge::create([
                'amount' => $request->amount, // convert to cents
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Jewelry Purchase',
            ]);

            // Create order
            $order = Order::create([
                'customer_id' => Auth::guard('customer')->id(),
                'total_price' => $request->amount,
                'status' => 'Pending',
                'ordered_date' => now(),
            ]);

            // Get cart items from session
            $cart = session('cart', []);

            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_name' => $item['name'] ?? 'Unknown Product',
                    'product_code' => $item['code'] ?? 'N/A',
                    'price' => $item['price'] ?? 0,
                    'quantity' => $item['quantity'] ?? 1,
                    'image' => $item['image'] ?? null,
                ]);
            }

            // Clear cart after order is placed
            session()->forget('cart');

            return redirect()->route('customers.success')->with('success', 'Payment successful and order placed!');
        } catch (\Exception $e) {
            return back()->with('error', 'Payment failed: ' . $e->getMessage());
        }
    }
}
