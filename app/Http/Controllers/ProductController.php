<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::query();

        // Search functionality
        if ($request->has('search')) {
            $products->where('name', 'like', '%' . $request->search . '%');
        }

        return view('products.index', ['products' => $products->paginate(10)]);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
}