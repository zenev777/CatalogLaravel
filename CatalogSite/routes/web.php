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

// Home route
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Static pages
Route::get('/aboutus', [AboutUsController::class, 'index'])->name('aboutus');
Route::get('/clients', [ClientController::class, 'index'])->name('clients');
Route::get('/partners', [PartnerController::class, 'index'])->name('partners');
Route::get('/service', [ServiceController::class, 'index'])->name('service');
Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts');

// Product route
Route::get('/product', [ProductController::class, 'index'])->name('product');

//specific categories 
Route::get('/categories/{id}/products', [CategoryController::class, 'index']);

