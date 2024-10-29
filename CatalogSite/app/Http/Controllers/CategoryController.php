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

            // Проверяваме дали има параметър за сортиране в заявката
            switch ($request->input('sort')) {
                case 'name_asc':
                    $products = $products->orderBy('title', 'asc');
                    break;
                case 'name_desc':
                    $products = $products->orderBy('title', 'desc');
                    break;
                case 'price_asc':
                    $products = $products->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $products = $products->orderBy('price', 'desc');
                    break;
                case 'date_desc':
                    $products = $products->orderBy('created_at', 'desc');
                    break;
                case 'promo':
                    $products = $products
                        ->whereNotNull('old_price')
                        ->orderBy('old_price', 'desc')
                        ->orderBy('price', 'asc');
                    break;
            }

            $products = $products->paginate(18);

            if (count($subcategories) > 1) {
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

            switch ($request->input('sort')) {
                case 'name_asc':
                    $products = $products->orderBy('title', 'asc');
                    break;
                case 'name_desc':
                    $products = $products->orderBy('title', 'desc');
                    break;
                case 'price_asc':
                    $products = $products->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $products = $products->orderBy('price', 'desc');
                    break;
                case 'date_desc':
                    $products = $products->orderBy('created_at', 'desc');
                    break;
                case 'promo':
                    $products = $products
                        ->whereNotNull('old_price')
                        ->orderBy('old_price', 'desc')
                        ->orderBy('price', 'asc');
                    break;
            }

            $products = $products->paginate(18);

            if (!$subcategories->isEmpty()) {
                return view('kategorii', [
                    'query' => $query,
                    'subcategories' => $subcategories,
                    'products' => $products,
                    'category' => $category
                ]);
            }
        }

        $subcategories = null;
        $products = Product::where('category_id', '=', $categoryId);

        switch ($request->input('sort')) {
            case 'name_asc':
                $products = $products->orderBy('title', 'asc');
                break;
            case 'name_desc':
                $products = $products->orderBy('title', 'desc');
                break;
            case 'price_asc':
                $products = $products->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $products = $products->orderBy('price', 'desc');
                break;
            case 'date_desc':
                $products = $products->orderBy('created_at', 'desc');
                break;
            case 'promo':
                $products = $products
                    ->whereNotNull('old_price')
                    ->orderBy('old_price', 'desc')
                    ->orderBy('price', 'asc');
                break;
        }

        $products = $products->paginate(18);

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

    private function applySorting($productsQuery, Request $request)
    {
        switch ($request->input('sort')) {
            case 'name_asc':
                return $productsQuery->orderBy('title', 'asc');
            case 'name_desc':
                return $productsQuery->orderBy('title', 'desc');
            case 'price_asc':
                return $productsQuery->orderBy('price', 'asc');
            case 'price_desc':
                return $productsQuery->orderBy('price', 'desc');
            case 'date_desc':
                return $productsQuery->orderBy('created_at', 'desc');
            case 'promo':
                return $productsQuery->where('old_price', '!=', null)->orderBy('price', 'asc');
        }
    }
}
