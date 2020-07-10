<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            
            $table->dateTime('data_venda')->nullable();

            $table->decimal('valor_entrada', 10, 2)->default(0);

            $table->decimal('valor_taxa', 10, 2)->default(0);
            $table->decimal('total_pagar', 10, 2)->default(0);

            $table->unsignedBigInteger('usuario_cadastro');
            $table->foreign('usuario_cadastro')->references('id')->on('users');

            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendas');
    }
}
