<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomiciliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domicilios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num_pedido',150);
            $table->foreign('num_pedido')->references('num_pedido')->on('pedidos');
            $table->unsignedInteger('id_comprador');
            $table->foreign('id_comprador')->references('id')->on('compradores');
            $table->unsignedInteger('id_domiciliario');
            $table->foreign('id_domiciliario')->references('id')->on('operadores');
            $table->string('nombre_cliente');
            $table->foreign('nombre_cliente')->references('nombre')->on('clientes');
            $table->date('fecha');
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
        Schema::dropIfExists('domicilios');
    }
}
