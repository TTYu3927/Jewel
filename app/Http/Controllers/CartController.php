<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
public function addToCart(Request $request, $id)
{
    $product = Product::findOrFail($id);
    $quantity = $request->input('quantity', 1);

    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['quantity'] += $quantity;
    } else {
        $cart[$id] = [
            'product_name' => $product->product_name,
            'image' => $product->image,
            'price' => $product->sale_price,
            'quantity' => $quantity
        ];
    }

    session()->put('cart', $cart);

    return redirect()->route('cart.index')->with('success', 'Added to cart!');
}

    
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('customers.cart', compact('cart'));
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index');
    }
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);
    
        if (isset($cart[$id])) {
            $newQty = (int) $request->input('quantity');
            $cart[$id]['quantity'] = $newQty > 0 ? $newQty : 1;
            session()->put('cart', $cart);
        }
    
        return redirect()->route('cart.index');
    }
    
    public function checkout()
    {
        $cart = session()->get('cart', []);
        $totalAmount = array_sum(array_map(function($item) {
            return (isset($item['price']) ? $item['price'] : 0) * (isset($item['quantity']) ? $item['quantity'] : 1);
        }, $cart));
        $shipping = 3000;
        $total = $totalAmount + $shipping;
            return view('customers.checkout', compact('cart', 'totalAmount', 'shipping', 'total'));    
        }
        
        public function payment()
        {
            $cart = session()->get('cart', []);
            $totalAmount = array_sum(array_map(function($item) {
                return (isset($item['price']) ? $item['price'] : 0) * (isset($item['quantity']) ? $item['quantity'] : 1);
            }, $cart));
            return view('customers.payment', compact('cart', 'totalAmount'));
        }
}
