<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos_pagamentos', function (Blueprint $table) {
            $table->id();
            $table->integer("id_pedido");
            $table->integer("id_formapagto");
            $table->integer("qtd_parcelas");
            $table->text("retorno_intermediador")->nullable();
            $table->text("data_processamento")->nullable();
            $table->string("num_cartao", 50)->nullable();
            $table->string("nome_portador", 50)->nullable();
            $table->integer("codigo_verificacao")->nullable();
            $table->string("vencimento", 10)->nullable();
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
        Schema::dropIfExists('pedidos_pagamentos');
    }
};
