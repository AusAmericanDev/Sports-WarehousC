<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id)
    {
        // 1. Find the specific category from the database using the ID
        $category = Category::findOrFail($id);

        // 2. Fetch only the products where the category_id matches this ID
        $products = Product::where('category_id', $id)->get();

        // FIX: Pull ALL categories from the database so the global header navbar loop doesn't break!
        $categories = Category::all();

        // Pass all three variables over to your template view file cleanly
        return view('category', compact('category', 'products', 'categories'));
    }
}
