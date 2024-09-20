<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $products = Product::all();

        $categoryWash = Category::where('slug', '=', 'profesionalni-miialni-mashini')->first();

        $categoryConvect = Category::where('slug', '=', 'reciklirani-konvektomati')->first();

        $subcategoriesWash = Category::where('parent_id', '=',$categoryWash->id)->get();

        $subcategoriesConvect = Category::where('parent_id', '=',$categoryConvect->id)->get();

        $productsWash = Product::where('category_id', '=', $categoryWash->id)->get();

        foreach ($subcategoriesWash as $subcategory) {
        $productsWash = $productsWash->merge(Product::where('category_id', '=', $subcategory->id)->get());
        }   

        $productsConvect = Product::where('category_id', '=', $categoryConvect->id)->get();

        foreach ($subcategoriesConvect as $subcategory) {
        $productsConvect = $productsConvect->merge(Product::where('category_id', '=', $subcategory->id)->get());
        }

        return view('index', ['products' => $products,  'productsConvect' => $productsConvect, 'productsWash' => $productsWash,]);
    }
}
