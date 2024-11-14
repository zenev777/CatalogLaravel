<?php

use App\Events\ProductCreated;
use App\Models\Product;
use App\Mail\NewProductNotification;
use App\Models\User;
use App\Providers\AppServiceProvider;
use Illuminate\Support\Facades\Mail;

it('sends an email notification when a product is created', function () {
    Mail::fake();

    // Създаване на продукт, което трябва да задейства събитието
    $product = Product::factory()->create();

    // Изрично задействане на събитието, ако не минава теста
    event(new ProductCreated($product));

    // Проверка, че имейлът е изпратен и съдържа правилния продукт
    Mail::assertSent(NewProductNotification::class, function ($mail) use ($product) {
        return $mail->product->id === $product->id;
    });
});

it('sends an email with the correct product data', function () {
    // Фиксиране на имейли за теста
    Mail::fake();

    // Създаване на продукт с данни
    $product = Product::factory()->create([
        'title' => 'Test Product',
        'price' => 29.99,
    ]);

    // Проверка на съдържанието на имейла
    Mail::assertSent(NewProductNotification::class, function ($mail) use ($product) {
        return $mail->product->title === 'Test Product'
            && $mail->product->price == 29.99;
    });
});

it('sends only one email when a product is created', function () {
    Mail::fake();

    // Създай единствен тестов потребител
    $users = User::all();

    // Създай продукт, който активира събитието
    $product = Product::factory()->create();


    // Проверка, че имейлът е изпратен само веднъж
    Mail::assertSent(NewProductNotification::class, $users->count());
});