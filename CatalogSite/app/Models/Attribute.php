<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use App\Models\Product;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'value',
        'product_id',
    ];

    /**
     * Get the product that owns the attribute.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
