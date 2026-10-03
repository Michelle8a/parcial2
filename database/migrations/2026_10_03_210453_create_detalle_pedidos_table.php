<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalle_pedidos', function (Blueprint $table) {
            $table->unsignedBigInteger('Id_Articulo');
            $table->unsignedBigInteger('Id_Pedido');
            $table->integer('Cantidad');
            $table->float('Descuento');

            $table->primary(['Id_Articulo', 'Id_Pedido']);

            //LLave foranea
            $table->foreign('Id_Pedido', 'FK_Detalle_Pedido_Pedido')->references('Id_Pedido')->on('pedidos');
            $table->foreign('Id_Articulo', 'FK_Detalle_Pedido_Articulo')->references('Id_Articulo')->on('articulos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_pedidos');
    }
};
