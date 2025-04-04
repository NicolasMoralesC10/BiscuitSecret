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
        Schema::create('ventas_has_productos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ventas_id_venta');
            $table->unsignedInteger('productos_id_producto');
            $table->integer('cantidad');
            $table->integer('subtotal');
            $table->integer('estado');

            // Llaves foráneas
            $table->foreign('ventas_id_venta')
                ->references('id')->on('ventas')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('productos_id_producto')
                ->references('id')->on('productos')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas_has_productos');
    }
};
