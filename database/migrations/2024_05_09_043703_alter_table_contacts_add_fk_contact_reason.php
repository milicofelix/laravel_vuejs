<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableContactsAddFkContactReason extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         //adicionando a coluna contact_reason_id
         Schema::table('contacts', function (Blueprint $table) {
            $table->unsignedBigInteger('contact_reason_id');
        });

        //atribuindo contact_reason para a nova coluna contact_reason_id
        DB::statement('update contacts set contact_reason_id = contact_reason');

        //criando a fk e removendo a coluna contact_reason
        Schema::table('contacts', function (Blueprint $table) {
            $table->foreign('contact_reason_id')->references('id')->on('contact_reasons');
            $table->dropColumn('contact_reason');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //criar a coluna contact_reason e removendo a fk
        Schema::table('contacts', function (Blueprint $table) {
            $table->integer('contact_reason');
            $table->dropForeign('contact_reason_id_foreign');
        });

        //atribuindo contact_reason_id para a coluna contact_reason
        DB::statement('update contacts set contact_reason = contact_reason_id');

        //removendo a coluna contact_reason_id
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn('contact_reason_id');
        });
    }
}
