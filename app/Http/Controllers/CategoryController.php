<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id)
    {
        // 1. Find the specific category from the database using the ID, or crash gracefully with a 404 if it doesn't exist
        $category = Category::findOrFail($id);

        // 2. Fetch only the products where the category_id matches this ID
        $products = Product::where('category_id', $id)->get();

        // 3. Pass both variables over to your category.blade.php template view file
        return view('category', compact('category', 'products'));
    }
}
