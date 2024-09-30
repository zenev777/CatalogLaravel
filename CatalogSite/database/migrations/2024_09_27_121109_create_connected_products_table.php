<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('connected_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id'); // Основен продукт
            $table->unsignedBigInteger('connected_product_id'); // Подобен продукт
            $table->timestamps();

            // Свързване на колоните към таблицата с продукти
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('connected_product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('connected_products');
    }
};
