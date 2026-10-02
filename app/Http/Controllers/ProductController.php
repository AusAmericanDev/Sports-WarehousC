<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // 1. Display a list of all products in the admin panel
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }
    // 2. Display the details of a single product on the product page
    public function show($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view('product.product', compact('product', 'categories'));
    }
    // 3. Display products filtered by category on the category page
    public function showByCategory($id)
    {
        $category = Category::findOrFail($id);
        $products = Product::where('category_id', $id)->get();
        return view('product.category', compact('category', 'products'));
    }
    //  4. Handle the search functionality to find products by name on the search results page
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
    // 5. Show the form to create a new product in the admin panel
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }
    // 6. Handle the form submission to store a new product in the database
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric|min:0',
            'sale_price'  => 'nullable|numeric|min:0',
            'description' => 'nullable|string',
            'image'       => 'nullable|string|max:255',
        ]);

        Product::create([
            'name'        => $request->input('name'),
            'category_id' => $request->input('category_id'),
            'price'       => $request->input('price'),
            'sale_price'  => $request->input('sale_price') ?? null,
            'description' => $request->input('description'),
            'image_path'  => $request->input('image') ?? 'default.jpg',
            'is_featured' => $request->has('is_featured') ? 1 : 0,
        ]);

        return redirect()->route('products.index')->with('success', 'Inventory item added successfully!');
    }
    // 7. Show the form to edit an existing product in the admin panel
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('admin.products.edit', compact('product', 'categories'));
    }
    // 8. Handle the form submission to update an existing product in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric|min:0',
            'sale_price'  => 'nullable|numeric|min:0',
            'description' => 'nullable|string',
            'image'       => 'nullable|string|max:255',
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'name'        => $request->input('name'),
            'category_id' => $request->input('category_id'),
            'price'       => $request->input('price'),
            'sale_price'  => $request->input('sale_price') ?? null,
            'description' => $request->input('description'),
            'image_path'  => $request->input('image') ?? 'default.jpg',
            'is_featured' => $request->has('is_featured') ? 1 : 0,
        ]);

        return redirect()->route('products.index')->with('success', 'Inventory item updated successfully!');
    }
    // 9. Handle the form submission to delete an existing product from the database
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Inventory item deleted successfully!');
    }
}
