<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use Carbon\Carbon;

class StopPromotions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'promotions:stop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Спира активните промоции и тези, които ще стартират след края на месеца.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();
    $endOfMonth = $now->endOfMonth();

    // Спиране на активните промоции (до края на месеца включително)
    $stoppedActivePromotions = Product::whereNotNull('promo_to')
        ->whereDate('promo_to', '<=', $endOfMonth)
        ->update([
            'promo_from' => null,
            'promo_to' => null,
        ]);

    // Спиране на бъдещи промоции (които започват в текущия месец)
    $stoppedFuturePromotions = Product::whereNotNull('promo_from')
        ->whereMonth('promo_from', '=', $now->month)
        ->update([
            'promo_from' => null,
            'promo_to' => null,
        ]);

    // Съобщение за успешното приключване
    $this->info("Спиране на промоции: {$stoppedActivePromotions} активни, {$stoppedFuturePromotions} бъдещи.");
    }
}
