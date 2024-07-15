<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'short_description',
        'description',
        'price',
        'product_id',
        'image',
        'position',
        'visible',
    ];

    /**
     * Get the product that owns the option.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
