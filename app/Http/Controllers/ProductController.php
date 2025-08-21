<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::with('category')->paginate(3);
    
        $categories = Category::all();
    
        return view('products.index', compact('products', 'categories'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name'     => 'required',
            'product_code'     => 'required|unique:products',
            'description'      => 'nullable',
            'purchased_price'  => 'required|numeric',
            'sale_price'       => 'required|numeric',
            'stock_qty'        => 'required|integer',
            'karats'           => 'required|in:14K,18K,24K',
            'category_id'      => 'required|exists:categories,id',
            'gender'           => 'nullable|string',
            'image'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'product_name'     => 'required',
            'product_code'     => 'required|unique:products,product_code,' . $product->id,
            'description'      => 'nullable',
            'purchased_price'  => 'required|numeric',
            'sale_price'       => 'required|numeric',
            'stock_qty'        => 'required|integer',
            'karats'           => 'required|in:14K,18K,24K',
            'category_id'      => 'required|exists:categories,id',
            'gender'           => 'nullable|string',
            'image'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        $related = Product::where('id', '!=', $product->id)
                      ->latest()
                      ->take(4)
                      ->get();

        return view('customers.detail', compact('product', 'related'));
    }
        
    public function shop(Request $request)
    {
        $query = Product::query();
    
        // Filter by category
        if ($request->filled('category') && $request->category != 'all') {
            if ($request->category == 'new_arrivals') {
                $query->latest(); // sort by newest first
            } elseif ($request->category == 'best_sellers') {
                $query->orderBy('sale_price', 'desc'); // example: best selling by price
            } else {
                $query->where('category_id', $request->category);
            }
        }
    
        // Sort by selection
        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'price_asc':
                    $query->orderBy('sale_price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('sale_price', 'desc');
                    break;
                case 'name_asc':
                    $query->orderBy('product_name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('product_name', 'desc');
                    break;
            }
        } else {
            $query->latest();
        }
    
        $products = $query->get();
        $categories = Category::all();
    
        return view('customers.shop', compact('products', 'categories'));
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
