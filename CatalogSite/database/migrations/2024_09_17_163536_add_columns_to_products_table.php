<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            // Order of columns is important, as we're adding them to an existing table...
            $table->integer('power')->nullable()->after('warranty_6m');
            $table->string('vpruzkvane')->nullable()->defaultValuellable();
            $table->string('revers')->nullable();
            $table->string('taimer')->nullable();
            $table->string('osvetlenie')->nullable();
            $table->decimal('raztuqnie_mejdu_vodachite', 5, 2)->nullable();
            $table->integer('temperatura')->nullable();
            $table->string('svurzvane')->nullable();
            $table->date('promo_from')->nullable();
            $table->date('promo_to')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            // Order of columns is important, as we're dropping them from an existing table...
            $table->dropColumn('power');
            $table->dropColumn('vpruzkvane');
            $table->dropColumn('revers');
            $table->dropColumn('taimer');
            $table->dropColumn('osvetlenie');
            $table->dropColumn('raztuqnie_mejdu_vodachite');
            $table->dropColumn('temperatura');
            $table->dropColumn('svurzvane');
        });
    }
};
