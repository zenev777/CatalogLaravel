<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Psr\Container\NotFoundExceptionInterface;
use App\Models\Product;


class ProductController extends Controller
{
    public function index($productId)
    {
        $product = Product::with('manufacturer')->find($productId);

        // Check if the product exists]
        if (!$product) {
            abort(404, 'Product not found');
        }

        return view('product', ['product' => $product]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        
        if (!$query) {
            return redirect()->back()->with('error', 'Please enter a search term.');
        }

        $product = Product::where('title', 'LIKE', "%{$query}%")
                            ->orWhere('sku', 'LIKE', "%{$query}%")
                            ->get();

        if (!$product) {
            // return not found page 
            return redirect()->back()->with('error', 'The product is missing');

        }

        $subcategories = null;

        return view('kategorii', ['products' => $product, 'subcategories' => $subcategories]);
    }
}

