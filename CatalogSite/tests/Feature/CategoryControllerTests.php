<?php

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    // Запълваме базата данни с данни чрез сийдъри
    $this->seed();
});

it('returns 404 if category does not exist', function () {
    $response = $this->get('/category/999');
    $response->assertStatus(404); // Очакваме 404 за несъществуваща категория
});

it('displays products for existing category without subcategories', function () {
    $category = Category::first(); // Вземаме първата категория от сейдъра

    $response = $this->get("/categories/{$category->id}/products");
    $response->assertStatus(200);
    $response->assertViewIs('kategorii'); // Проверява дали се използва правилният изглед
    $response->assertViewHas('products');
});

it('displays subcategories if parent category has subcategories', function () {
    $parentCategory = Category::whereNull('parent_id')->first(); // Намираме основна категория

    $response = $this->get("/categories/{$parentCategory->id}/products");
    $response->assertStatus(200);
    $response->assertViewHas('subcategories'); // Проверява дали подкатегориите са налични в изгледа
});

it('sorts products by name ascending', function () {
    // Вземаме първата категория от сейдъра
    $category = Category::first();

    // Създаване на продукти
    Product::create(['category_id' => $category->id, 'title' => 'AA Product', 'description' => 'Oke B product', 'price' => 20]);
    Product::create(['category_id' => $category->id, 'title' => 'AB Product', 'description' => 'Oke A product', 'price' => 10]);

    // Извикване на метода index с параметър за сортиране
    $response = $this->get(route('categories.index', [
        'id' => $category->id, // коригирано на 'id'
        'sort' => 'name_asc'
    ]));

    // Проверка на статуса на отговора
    $response->assertStatus(200);

    // Вземаме продуктите от отговора
    $products = $response->viewData('products')->items();

    // Проверка за правилния ред на продуктите
    expect($products[0]->title)->toBe('AA Product');
    expect($products[1]->title)->toBe('AB Product');
});

it('sorts products by price descending', function () {
    // Вземаме първата категория от сейдъра
    $category = Category::first();

    // Създаване на продукти
    Product::create(['category_id' => $category->id, 'title' => 'C Product', 'description' => 'Oke C product', 'price' => 5000]);
    Product::create(['category_id' => $category->id, 'title' => 'D Product', 'description' => 'Oke D product', 'price' => 10000]);

    // Извикване на метода index с параметър за сортиране
    $response = $this->get(route('categories.index', [
        'id' => $category->id, // коригирано на 'id'
        'sort' => 'price_desc'
    ]));

    // Проверка на статуса на отговора
    $response->assertStatus(200);

    // Вземаме продуктите от отговора
    $products = $response->viewData('products')->items();

    // Проверка за правилния ред на продуктите
    expect((float) $products[0]->price)->toBe(10000.00);
    expect((float) $products[1]->price)->toBe(5000.00);
});


it('displays all categories in allcategory view', function () {
    $response = $this->get('/categories');
    $response->assertStatus(200);
    $response->assertViewIs('allcategory');
    $response->assertViewHas('allcategory');
});


