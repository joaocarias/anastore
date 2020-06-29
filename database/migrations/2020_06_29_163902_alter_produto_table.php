<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProdutoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('categoria_produto_id')->nullable();
            $table->foreign('categoria_produto_id')->references('id')->on('categoria_produtos');

            $table->unsignedBigInteger('tamanho_produto_id')->nullable();
            $table->foreign('tamanho_produto_id')->references('id')->on('tamanho_produtos');

            $table->unsignedBigInteger('cor_id')->nullable();
            $table->foreign('cor_id')->references('id')->on('cors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn('categoria_produto_id');
            $table->dropColumn('tamanho_produto_id');
            $table->dropColumn('cor_id');
        });
    }
}
