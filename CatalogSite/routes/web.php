<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
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
//All categories 
Route::get('/categories', [CategoryController::class, 'allcategory'])->name('allcategories');

// Product route
Route::get('/product/{id}', [ProductController::class, 'index'])->name('product.index');

//specific categories 
Route::get('/categories/{id}/products', [CategoryController::class, 'index'])->name('categories.index');

// Search existing product route
Route::get('/search', [ProductController::class, 'search'])->name('search');

// Receive email from contact form
Route::post('/contact/send', [ContactsController::class, 'sendEmail'])->name('contact.send');
Route::post('/product/{id}/inquiry', [ContactsController::class, 'sendInquiry'])->name('sendInquiry');

// Define a route for static pages with a dynamic slug
Route::get('/{slug}', [PageController::class, 'index'])->name('page.index');