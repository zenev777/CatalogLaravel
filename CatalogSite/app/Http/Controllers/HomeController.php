<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view('index'); 
    }
    
    public function aboutus(){
        return view('zanas'); 
    }

    public function partners(){
        return view('partniori'); 
    }

    public function clients(){
        return view('clienti'); 
    }

    public function service(){
        return view('serviz'); 
    }

    public function contacts(){
        return view('contacti'); 
    }

    public function categories(){
        return view('kategorii'); 
    }

    public function product(){
        return view('product'); 
    }
}
