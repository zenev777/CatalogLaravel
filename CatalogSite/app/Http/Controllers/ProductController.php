<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id){

        $product = Product::find($id);

        return view('product', ['product' => $product]); 
    }
}
