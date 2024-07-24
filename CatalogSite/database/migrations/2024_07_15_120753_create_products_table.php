<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('short_description');
            $table->text('description');
            $table->string('sku');
            $table->string('manufacturer_code');
            $table->unsignedBigInteger('manufacturer_id');
            $table->unsignedBigInteger('category_id');
            $table->string('slug');
            $table->decimal('price', 8, 2);
            $table->integer('position');
            $table->integer('weight');
            $table->integer('width');
            $table->integer('height');
            $table->integer('length');
            $table->integer('available_qty');
            $table->tinyInteger('is_featured')->default(0);
            $table->tinyInteger('is_new')->default(0);
            $table->tinyInteger('is_top_price')->default(0);
            $table->tinyInteger('warranty_1y')->default(0);
            $table->tinyInteger('warranty_6m')->default(0);
            $table->timestamps();
            
            //$table->foreign('manufacturer_id')->references('id')->on('manufacturers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
