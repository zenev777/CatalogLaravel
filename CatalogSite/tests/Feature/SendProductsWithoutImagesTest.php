<?php

use Illuminate\Mail\SentMessage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Artisan;
use App\Models\Product;

it('sends email for products without images', function () {
    // Mock data
    Product::factory()->create(['images' => null]);
    Product::factory()->create(['images' => 'image.jpg']);

    // Mock email sending
    Mail::fake();
    Config::set('mail.admin_email', 'admin@example.com');

    // Execute command
    Artisan::call('email:products-without-images');

    // Debugging
    dump(Artisan::output());

    // Assertions
    Mail::assertSent(function (SentMessage $mail) {
        $recipients = $mail->getTo();
        return $recipients[0]->getAddress() === 'admin@example.com' &&
            $mail->getSubject() === 'Daily Report: Products Without Images';
    });

    expect(Artisan::output())->toContain('Email sent to admin with products without images.');
});

it('does not send email if no products without images', function () {
    // Mock data
    Product::factory()->create(['images' => 'image1.jpg']);
    Product::factory()->create(['images' => 'image2.jpg']);

    // Mock email sending
    Mail::fake();

    // Execute command
    Artisan::call('email:products-without-images');

    // Assertions
    Mail::assertNothingSent();
    expect(Artisan::output())->toContain('No products without images found.');
});


