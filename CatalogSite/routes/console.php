<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::command('import:products')->daily();

Schedule::command('promotions:stop')->monthlyOn(date('t'), '23:59');

Schedule::command('email:products-without-images')->daily();

Schedule::command('email:promo-products')->weeklyOn(1, '8:00');