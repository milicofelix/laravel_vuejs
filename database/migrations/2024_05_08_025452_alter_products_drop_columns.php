<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProductsDropColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //removendo colunas da tabela produtos
        Schema::table('products', function (Blueprint $table) {
        $table->dropColumn(['sale_price', 'min_stock', 'max_stock']);
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
            $table->decimal('sale_price', 8, 2);
            $table->integer('min_stock');
            $table->integer('max_stock');
        });
    }
}
