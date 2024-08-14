<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Psr\Container\NotFoundExceptionInterface;
use App\Models\Product;


class ProductController extends Controller
{
    public function index(){
        return view('product'); 
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        
        if (!$query) {
            return redirect()->back()->with('error', 'Please enter a search term.');
        }

        $product = Product::where('title', 'LIKE', "%{$query}%")
                            ->orWhere('sku', 'LIKE', "%{$query}%")
                            ->first();

        if (!$product) {
            // return not found page 
            return redirect()->back()->with('error', 'The product is missing');

        }

        return view('product', ['product' => $product]);
    }
}

