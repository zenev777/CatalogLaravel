<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'short_description',
        'description',
        'sku',
        'manufacturer_code',
        'manufacturer_id',
        'category_id',
        'slug',
        'price',
        'old_price',
        'position',
        'weight',
        'width',
        'height',
        'length',
        'available_qty',
        'is_featured',
        'is_new',
        'is_top_price',
        'warranty_1y',
        'warranty_6m',
        'power',
        'vpruzkvane',
        'revers',
        'taimer',
        'osvetlenie',
        'raztuqnie_mejdu_vodachite',
        'temperatura',
        'svurzvane',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product', 'product_id', 'category_id');
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    // Връзка към подобни продукти, които този продукт има
    public function connectedProducts()
    {
        return $this->belongsToMany(Product::class, 'connected_products', 'product_id', 'connected_product_id');
    }

    // Връзка към продукти, на които този продукт е подобен
    public function connectedTo()
    {
        return $this->belongsToMany(Product::class, 'connected_products', 'connected_product_id', 'product_id');
    }
}
