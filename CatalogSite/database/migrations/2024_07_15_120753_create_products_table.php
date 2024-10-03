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
            $table->string('short_description')->nullable();
            $table->text('description');
            $table->string('sku')->nullable();
            $table->string('manufacturer_code')->nullable();
            $table->unsignedBigInteger('manufacturer_id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('slug');
            $table->decimal('price', 8, 2);
            $table->integer('position')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->integer('length')->nullable();
            $table->integer('available_qty')->nullable();
            $table->tinyInteger('is_featured')->default(0);
            $table->tinyInteger('is_new')->default(0);
            $table->tinyInteger('is_top_price')->default(0);
            $table->decimal('old_price', 8, 2)->nullable();
            $table->tinyInteger('warranty_1y')->default(0);
            $table->tinyInteger('warranty_6m')->default(0);
            $table->timestamps();
            $table->json('images')->nullable();

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
