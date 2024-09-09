<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryProductTable extends Migration
{
    public function up()
    {
        Schema::create('category_product', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Foreign key to categories table
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // Foreign key to products table
            // No timestamps() method call here
        });
    }

    public function down()
    {
        Schema::dropIfExists('category_product');
    }
}

