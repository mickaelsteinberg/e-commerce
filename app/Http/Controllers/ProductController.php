<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() 
    {
        return view('product.index', [
            'products' => Product::with('category')->get(),
            'categories' => Category::all()
        ]);
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }
}
