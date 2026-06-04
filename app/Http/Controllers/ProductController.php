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

        return view('product.product', compact('product', 'categories'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('query');
        $singularTerm = Str::singular($searchTerm);
        $categories = Category::all();

        $products = Product::where('name', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('name', 'LIKE', '%' . $singularTerm . '%')
            ->get();

        return view('product.search', [
            'products' => $products,
            'categories' => $categories,
            'query' => $searchTerm,
            'searchTerm' => $searchTerm
        ]);
    }
}
