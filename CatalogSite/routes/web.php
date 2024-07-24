<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use GuzzleHttp\Client;

//temporary route
Route::get('/', [HomeController::class,'index']);

Route::get('/home', [HomeController::class,'index']);

Route::get('/aboutus', [AboutUsController::class,'index']);

Route::get('/clients', [ClientController::class,'index']);

Route::get('/partners', [PartnerController::class,'index']);

Route::get('/service', [ServiceController::class,'index']);

Route::get('/contacts', [ContactsController::class,'index']);

//Route::get('/categories', [CategoryController::class,'index']);

Route::get('/product', [ProductController::class,'index']);

//specific categories 
Route::get('/categories/{id}/products', [CategoryController::class, 'index']);