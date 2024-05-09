<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('unit', 5); //cm, mn, kg
            $table->string('description', 30);
            $table->timestamps();
        });

        //adicionar o relacionamento com a tabela produtos
        Schema::table('products', function(Blueprint $table) {
        $table->unsignedBigInteger('unit_id');
        $table->foreign('unit_id')->references('id')->on('units');
    });

        //adicionar o relacionamento com a tabela produto_detalhes
        Schema::table('product_details', function(Blueprint $table) {
            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id')->references('id')->on('units');
        });
    
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //remover o relacionamento com a tabela produto_detalhes
        Schema::table('product_details', function(Blueprint $table) {
            //remover a fk
            $table->dropIfExistsForeign('produtct_details_unit_id_foreign'); //[table]_[coluna]_foreign
            //remover a coluna unidade_id
            $table->dropColumn('unit_id');
        });

        //remover o relacionamento com a tabela produtos
        Schema::table('products', function(Blueprint $table) {
            //remover a fk
            $table->dropForeign('products_unit_id_foreign'); //[table]_[coluna]_foreign
            //remover a coluna unidade_id
            $table->dropColumn('unit_id');
        });
        Schema::dropIfExists('units');
    }
}
