<?php

use App\Models\Product;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('imports at least one product after running the import command', function () {
    expect(Product::count())->toBe(0);

    Artisan::call('import:products');

    expect(Product::count())->toBeGreaterThan(0);
});
