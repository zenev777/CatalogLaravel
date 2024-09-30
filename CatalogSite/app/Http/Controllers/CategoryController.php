<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($categoryId)
    {

        $category = Category::find($categoryId);
        $query = null;
        // Check if the category exists
        if (!$category) {
            abort(404, 'Category not found');
        }

        if ($category->parent_id == null) {
            $subcategories = Category::where('parent_id', '=', $categoryId)->get();

            // Check if the subcategories exists
            if (count($subcategories) > 1) {
                //return view with subcategories
                return view('kategorii', [
                    'query' => $query,
                    'subcategories' => $subcategories,
                    'category' => $category
                ]);
            }
        }
        $subcategories = null;
        // Retrieve products for the category
        $products = Product::where('category_id', '=', $categoryId)->get();



        // Return view with products
        return view('kategorii', [
            'products' => $products,
            'query' => $query,
            'subcategories' => $subcategories,
            'category' => $category
        ]);

    }

    public function allcategory(){
        $allcategory = Category::all();

        return view('allcategory',['allcategory' => $allcategory]);
    }

    public function getMenuCategories()
    {
        return Category::where('in_menu', true)
            ->orderBy('menu_order')
            ->get();
    }
}
