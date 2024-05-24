<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableProductSupplierRelationship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         //adicionando a coluna contact_reason_id
         Schema::table('products', function (Blueprint $table) {

            // insert Supplier data to do the relationship
            $supplier_id = DB::table('suppliers')->insertGetId([
                            'name' => 'Standard Supplier SG',
                            'site' => 'standar_supplier.com.br',
                            'uf' => 'SC',
                            'email' => 'contato@standar_supplier.com.br'
                        ]);

            $table->unsignedBigInteger('supplier_id')->default($supplier_id)->after('id');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
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
        $table->dropForeign('products_supplier_id_foreign');
        $table->dropColumn('supplier_id');
        
    });
}
}
