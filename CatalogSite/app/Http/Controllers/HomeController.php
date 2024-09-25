<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\HomepageBox;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $products = Product::all();

        $categoryWash = Category::where('slug', '=', 'profesionalni-miialni-mashini')->first();

        $categoryConvect = Category::where('slug', '=', 'reciklirani-konvektomati')->first();

        $subcategoriesWash = Category::where('parent_id', '=', $categoryWash->id)->get();

        $subcategoriesConvect = Category::where('parent_id', '=', $categoryConvect->id)->get();

        $productsWash = Product::where('category_id', '=', $categoryWash->id)
            ->where("is_featured", true)
            ->get();

        $homeboxeOne = HomepageBox::where('position', '=', 1)->first();

        $homeboxes = HomepageBox::whereIn('position', [2, 3, 4])
            ->orderBy('position', 'asc')
            ->get();

        foreach ($subcategoriesWash as $subcategory) {
            $productsWash = $productsWash->merge(Product::where('category_id', '=', $subcategory->id)->get());
        }

        $productsConvect = Product::where('category_id', '=', $categoryConvect->id)
            ->where("is_featured", true)
            ->get();

        $homepageProducts = Product::where('is_featured', true)->get();

        foreach ($subcategoriesConvect as $subcategory) {
            $productsConvect = $productsConvect->merge(Product::where('category_id', '=', $subcategory->id)->get());
        }

        return view('index', ['products' => $products, 'productsConvect' => $productsConvect, 'productsWash' => $productsWash, 'homeboxeOne' => $homeboxeOne, 'homeboxes' => $homeboxes, 'homepageProducts' => $homepageProducts]);
    }
}
