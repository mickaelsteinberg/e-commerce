<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $products = \App\Models\Product::with('category')->get();
        $categories = \App\Models\Category::with('products')->get();
        $clients = \App\Models\User::where('role', 'client')->get();

        return view('admin.dashboard', compact('products', 'categories', 'clients'));
    }
}
