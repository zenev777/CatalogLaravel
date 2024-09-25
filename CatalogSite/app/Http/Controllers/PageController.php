<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index($slug){

        // Find the first page with the given slug using Eloquent
        $page = Page::where('slug', $slug)->first();

        // If no page is found, return a 404 error
        if (!$page) {
            abort(404);
        }

        return view('static-page', ['page' => $page]); 
    }
}
