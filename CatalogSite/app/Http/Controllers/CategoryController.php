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


        $subcategories = $category->parent_id === null
            ? Category::where('parent_id', '=', $categoryId)->get()
            : Category::where('parent_id', '=', $categoryId)->get();

        $productsQuery = Product::where('category_id', '=', $categoryId);


        $productsQuery = $this->applySorting($request, $productsQuery);

        $products = $productsQuery->paginate(18);

        if ($category->parent_id === null && count($subcategories) > 1) {
            return view('kategorii', compact('query', 'subcategories', 'products', 'category'));
        } elseif (!$subcategories->isEmpty()) {
            return view('kategorii', compact('query', 'subcategories', 'products', 'category'));
        }

        // Ако няма подкатегории, връщаме категория с продукти
        $subcategories = null;

        return view('kategorii', compact('products', 'query', 'subcategories', 'category'));
    }


    private function applySorting(Request $request, $productsQuery)
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
                return $productsQuery
                    ->whereNotNull('old_price')
                    ->orderBy('old_price', 'desc')
                    ->orderBy('price', 'asc');
            default:
                return $productsQuery;
        }
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
}
