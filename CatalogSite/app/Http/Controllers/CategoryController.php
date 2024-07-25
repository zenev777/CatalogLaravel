<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($categoryId){

        $category = Category::find($categoryId);
      
        // Check if the category exists]
        if (!$category) {
            abort(404, 'Category not found');
        }

        // Retrieve products for the category
        $products = Product::where('category_id', '=', $categoryId)->get();


        // Return view with products
        return view('kategorii', ['products' => $products]);
    }
}
