<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;

class WeeklyPromoProductsEmail extends Command
{
    protected $signature = 'email:promo-products';
    protected $description = 'Send a weekly email to admin with promo products';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {

        $now = new \DateTime();


        $promoProducts = Product::whereNotNull('promo_from')
            ->whereNotNull('promo_to')
            ->where('promo_from', '<=', $now->format('Y-m-d H:i:s'))
            ->where('promo_to', '>=', $now->format('Y-m-d H:i:s'))
            ->get();

        if ($promoProducts->isEmpty()) {
            $this->info('No promo products found.');
            return;
        }

        $adminEmail = config('mail.admin_email');

        $data = $promoProducts->map(function ($product) use ($now) {
            $promoEndDate = new \DateTime($product->promo_to);
            $interval = $now->diff($promoEndDate);

            return [
                'title' => $product->title,
                'image' => $product->image,
                'price' => $product->price,
                'old_price' => $product->old_price,
                'days_remaining' => $interval->days,
            ];
        });

        Mail::send('promo_products', ['products' => $data], function ($message) use ($adminEmail) {
            $message->to($adminEmail)
                ->subject('Weekly Report: Promo Products');
        });

        $this->info('Weekly promo email sent to admin.');
    }
}


