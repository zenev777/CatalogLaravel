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
}
