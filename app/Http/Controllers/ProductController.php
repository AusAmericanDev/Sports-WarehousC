<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.product', compact('product'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('query');

        $singularTerm = Str::singular($searchTerm);

        $products = Product::where('name', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('name', 'LIKE', '%' . $singularTerm . '%')
            ->get();

        return view('products.search', compact('products', 'searchTerm'));
    }
}
