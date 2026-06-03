<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function show($id)
    {
        // 1. Pulls all active database records cleanly
        $categories = Category::all();
        $product = Product::findOrFail($id);

        // FIX: Changed from 'products.product' to 'products.show' to load your fixed inline template file!
        return view('products.show', compact('product', 'categories'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('query');
        $singularTerm = Str::singular($searchTerm);
        $categories = Category::all();

        $products = Product::where('name', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('name', 'LIKE', '%' . $singularTerm . '%')
            ->get();

        return view('products.search', [
            'products' => $products,
            'categories' => $categories,
            'query' => $searchTerm,
            'searchTerm' => $searchTerm
        ]);
    }
}
