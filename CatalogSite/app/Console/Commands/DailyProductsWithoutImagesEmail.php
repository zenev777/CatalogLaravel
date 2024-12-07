<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class DailyProductsWithoutImagesEmail extends Command
{
    protected $signature = 'email:products-without-images';
    protected $description = 'Send a daily email to admin with a list of products without images';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $productsWithoutImages = Product::whereNull('images')->get();

        if ($productsWithoutImages->isEmpty()) {
            $this->info('No products without images found.');
            return;
        }

        $adminEmail = config('mail.admin_email');

        $data = [
            'products' => $productsWithoutImages
        ];

        Mail::send('products_without_images', $data, function ($message) use ($adminEmail) {
            $message->to($adminEmail)
                ->subject('Daily Report: Products Without Images');
        });

        $this->info('Email sent to admin with products without images.');
    }
}
