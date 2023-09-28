<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();

        return view('product-list', compact('products'));
    }

    public function productDetail($productCode)
    {
        $products = Product::where('product_code', $productCode)->first();
        $nextProduct = Product::all();

        return view('product-detail', compact('products', 'nextProduct'));
    }

    public function checkout()
    {
        $products = Product::all();

        return view('checkout', compact('products'));
    }
}
