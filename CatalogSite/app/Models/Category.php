<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'title',
        'slug',
        'short_description',
        'description',
        'visible',
        'featured',
        'position',
        'menu_icon',
        'image',
    ];

    /**
     * Get the parent category.
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }


    /**
     * Get the subcategories.
     */
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_product', 'product_id', 'category_id');
    }

    public function faqs() {
        return $this->hasMany(FAQ::class);
    }
    

}
