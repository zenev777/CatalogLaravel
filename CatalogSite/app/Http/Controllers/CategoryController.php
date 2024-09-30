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

        if (!$category) {
            abort(404, 'Category not found');
        }

        if ($category->parent_id == null) {
            $subcategories = Category::where('parent_id', '=', $categoryId)->get();

            $products = Product::where('category_id', '=', $categoryId)->get();
            // Check if the subcategories exists
            if (count($subcategories) > 1) {
                //return view with subcategories
                return view('kategorii', [
                    'query' => $query,
                    'subcategories' => $subcategories,
                    'products' => $products,
                    'category' => $category
                ]);
            }
        }
        else{
            $subcategories = Category::where('parent_id', '=', $categoryId)->get();

            $products = Product::where('category_id', '=', $categoryId)->get();
            // Check if the subcategories exists
            if (!$subcategories->isEmpty()) {
                //return view with subcategories
                return view('kategorii', [
                    'query' => $query,
                    'subcategories' => $subcategories,
                    'products' => $products,
                    'category' => $category
                ]);
            }
        }

        $subcategories = null;
        // Retrieve products for the category
        $products = Product::where('category_id', '=', $categoryId)->paginate($productsPerPage = 18);



        // Return view with products
        return view('kategorii', [
            'products' => $products,
            'query' => $query,
            'subcategories' => $subcategories,
            'category' => $category
        ]);

    }

  

    public function allcategory(){

        $allcategory = Category::where('visible', true)
                ->orderBy('position', 'asc')
                ->get();
                
        
        return view('allcategory',['allcategory' => $allcategory]);
    }

    public function getMenuCategories()
    {
        return Category::where('in_menu', true)
            ->orderBy('menu_order')
            ->get();
    }
}
