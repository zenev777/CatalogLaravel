<?php

namespace App\Models;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManufacturersTable extends Migration
{
    public function up()
    {
        Schema::create('manufacturers', function (Blueprint $table) {
            $table->id();  // This creates an unsignedBigInteger by default
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->integer('position');
            $table->string('image');  // Path to the image
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('manufacturers');
    }
}
