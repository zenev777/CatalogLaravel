<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\FAQ;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($categoryId, Request $request)
    {
        $category = Category::find($categoryId);
        $query = null;

        if (!$category) {
            abort(404, 'Category not found');
        }

        if ($category->parent_id == null) {
            $subcategories = Category::where('parent_id', '=', $categoryId)->get();

            $products = Product::where('category_id', '=', $categoryId);

            $products = $this->applySorting($products, $request->input('sort'));

            $products = $products->paginate(18);
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
        } else {
            $subcategories = Category::where('parent_id', '=', $categoryId)->get();

            $products = Product::where('category_id', '=', $categoryId);

            $products = $this->applySorting($products, $request->input('sort'));

            $products = $products->paginate(18);
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
        $products = Product::where('category_id', '=', $categoryId);


        $products = $this->applySorting($products, $request->input('sort'));

        $products = $products->paginate(18);
        // Return view with products
        return view('kategorii', [
            'products' => $products,
            'query' => $query,
            'subcategories' => $subcategories,
            'category' => $category
        ]);

    }

    public function allcategory()
    {

        $allcategory = Category::where('visible', true)
            ->orderBy('position', 'asc')
            ->get();

        return view('allcategory', ['allcategory' => $allcategory]);
    }

    public function getMenuCategories()
    {
        return Category::where('in_menu', true)
            ->orderBy('menu_order')
            ->get();
    }

    private function applySorting($products, $sortOption)
    {
        switch ($sortOption) {
            case 'name_asc':
                return $products->orderBy('title', 'asc');
            case 'name_desc':
                return $products->orderBy('title', 'desc');
            case 'price_asc':
                return $products->orderByRaw("
                    CASE 
                        WHEN promo_from IS NOT NULL 
                             AND promo_to IS NOT NULL 
                             AND promo_from <= NOW() 
                             AND promo_to >= NOW() 
                        THEN price
                        ELSE old_price
                    END ASC
                ");
            case 'price_desc':
                return $products->orderByRaw("
                    CASE 
                        WHEN promo_from IS NOT NULL 
                             AND promo_to IS NOT NULL 
                             AND promo_from <= NOW() 
                             AND promo_to >= NOW() 
                        THEN price
                        ELSE old_price
                    END DESC
                ");
            case 'date_desc':
                return $products->orderBy('created_at', 'desc');
            case 'promo':
                return $products
                    ->orderByRaw("
                        CASE 
                            WHEN promo_from IS NOT NULL 
                                 AND promo_to IS NOT NULL 
                                 AND promo_from <= NOW() 
                                 AND promo_to >= NOW() 
                            THEN 1 
                            ELSE 0 
                        END DESC
                    ")
                    ->orderByRaw("
                        CASE 
                            WHEN promo_from IS NOT NULL 
                                 AND promo_to IS NOT NULL 
                                 AND promo_from <= NOW() 
                                 AND promo_to >= NOW() 
                            THEN price
                            ELSE old_price
                        END ASC
                    ");
            default:
                return $products;
        }
    }

}
