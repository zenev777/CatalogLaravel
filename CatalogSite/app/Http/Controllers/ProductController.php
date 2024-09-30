<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
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

        $category = Category::find($product->category_id);

        // Извличане на свързаните продукти (ако има)
        $connectedProducts = $product->connectedProducts;

        if ($connectedProducts->IsEmpty()) {
            // Ако няма свързани продукти, вземаме продукти от същата категория
            $connectedProducts = Product::where('category_id', '=', $product->category_id)
                ->where('id', '!=', $product->id)
                ->limit(12)
                ->get();
        }


        return view(
            'product',
            [
                'product' => $product,
                'category' => $category,
                'connectedProducts' => $connectedProducts,
            ]
        );
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

        $category = null;
        $subcategories = null;

        return view('kategorii', ['products' => $product, 'subcategories' => $subcategories, 'query' => $query, 'category' => $category]);
    }
}

