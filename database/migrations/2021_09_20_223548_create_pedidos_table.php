<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->string('num_pedido',150)->primary();

            $table->string('direccion');
            $table->unsignedInteger('id_domiciliario');
            $table->foreign('id_domiciliario')->references('id')->on('operadores');
            $table->string('empresa_cliente');
            $table->string('telefono_comprador');
            $table->string('telefono_vendedor');
            $table->string('email_vendedor');
            $table->string('email_comprador');
            $table->string('estado', 100);
            $table->string('fecha_llegada');
            $table->string('fecha_entrega');
            $table->text('motivo_incumplimiento')->nullable();
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
        Schema::dropIfExists('pedidos');
    }
}
