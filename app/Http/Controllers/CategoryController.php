<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Display list of categories
    public function index(Request $request)
    {
        $query = Category::query();

    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }
        $categories = Category::paginate(2);

        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.index');
    }

    // Store a new category
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }

    // Show the edit form
    public function edit(Category $category)
    {
        return view('category.index', compact('category'));    }

    // Update the category
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    // Delete a category
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
    }
}
