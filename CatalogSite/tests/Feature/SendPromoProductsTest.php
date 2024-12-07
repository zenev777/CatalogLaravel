<?php

use Illuminate\Mail\SentMessage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Artisan;
use App\Models\Product;

it('sends email for promo products', function () {
    // Mock data
    Product::factory()->create([
        'promo_from' => now()->subDay(),
        'promo_to' => now()->addDay(),
        'title' => 'Promo Product 1',
        'price' => 50,
        'old_price' => 100,
        'images' => 'image1.jpg',
    ]);
    Product::factory()->create([
        'promo_from' => now()->subDay(),
        'promo_to' => now()->addDay(),
        'title' => 'Promo Product 2',
        'price' => 30,
        'old_price' => 60,
        'images' => 'image2.jpg',
    ]);

    // Mock email sending
    Mail::fake();
    Config::set('mail.admin_email', 'admin@example.com');

    // Execute command
    Artisan::call('email:promo-products');

    // Debugging
    dump(Artisan::output());

    // Assertions
    Mail::assertSent(function (SentMessage $mail) {
        return $mail->getTo()[0]->getAddress() === 'admin@example.com';
    });

    expect(Artisan::output())->toContain('Weekly promo email sent to admin.');
});

it('does not send email if no promo products', function () {
    // Mock data
    Product::factory()->create([
        'promo_from' => now()->subDays(2),
        'promo_to' => now()->subDay(),
    ]);
    Product::factory()->create([
        'promo_from' => now()->addDay(),
        'promo_to' => now()->addDays(2),
    ]);

    // Mock email sending
    Mail::fake();

    // Execute command
    Artisan::call('email:promo-products');

    // Assertions
    Mail::assertNothingSent();
    expect(Artisan::output())->toContain('No promo products found.');
});
