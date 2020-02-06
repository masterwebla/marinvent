<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimientos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha');
            $table->integer('numero');
            $table->text('descripcion')->nullable();
            $table->integer('total');
            $table->unsignedBigInteger('proveedor_id');
            $table->foreign('proveedor_id')->references('id')->on('proveedores');
            $table->unsignedBigInteger('sucursalemite_id');
            $table->foreign('sucursalemite_id')->references('id')->on('sucursales');
            $table->unsignedBigInteger('sucursalrecibe_id');
            $table->foreign('sucursalrecibe_id')->references('id')->on('sucursales');
            $table->unsignedBigInteger('tipomovimiento_id');
            $table->foreign('tipomovimiento_id')->references('id')->on('tipos_movimientos');
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
        Schema::dropIfExists('movimientos');
    }
}
