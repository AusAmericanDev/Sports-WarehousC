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
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view('products.product', compact('product', 'categories'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('query');
        $singularTerm = \Illuminate\Support\Str::singular($searchTerm);
        $categories = \App\Models\Category::all();
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
