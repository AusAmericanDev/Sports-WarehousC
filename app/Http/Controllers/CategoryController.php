<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
// This controller manages CRUD operations for product categories in the admin panel
class CategoryController extends Controller
{ // 1. Display a list of all categories
    public function index()
    { // Fetch all categories from the database and pass them to the
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    { // 2. Show the form to create a new category
        return view('admin.categories.create');
    }
    // 3. Handle the form submission to store a new category in the database
    public function store(Request $request)
    { // Validate the incoming request data to ensure the category name is provided and unique
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);
        // Create a new category record in the database using the validated data
        Category::create([
            'name' => $request->input('name')
        ]);
        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }
    // 4. Show the form to edit an existing category
    public function edit($id)
    { // Find the category by its ID and pass it to the edit view
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }
    // 5. Handle the form submission to update an existing category in the database
    public function update(Request $request, $id)
    { // Validate the incoming request data to ensure the category name is provided and unique, excluding the current category being updated
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
        ]);
        // Find the category by its ID and update its name with the validated data
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->input('name')
        ]);
        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }
    // 6. Handle the deletion of a category from the database
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }
}
