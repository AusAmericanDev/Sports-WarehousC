<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Grab only products where is_featured is true (1)
        $featuredProducts = Product::where('is_featured', true)->get();

        // Pass that collection to your resources/views/home.blade.php template
        return view('home', compact('featuredProducts'));
    }
}
