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
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product', 'category_id', 'product_id');
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }


}
