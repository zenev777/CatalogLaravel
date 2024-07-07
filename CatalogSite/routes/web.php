<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/home', [HomeController::class,'home']);

Route::get('/aboutus', [HomeController::class,'aboutus']);

Route::get('/clients', [HomeController::class,'clients']);

Route::get('/partners', [HomeController::class,'partners']);

Route::get('/service', [HomeController::class,'service']);

Route::get('/contacts', [HomeController::class,'contacts']);

Route::get('/categories', [HomeController::class,'categories']);

Route::get('/product', [HomeController::class,'product']);