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
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->date('fechaadquisicion');
            $table->string('marca');
            $table->string('modelo');
            $table->string('serie');
            $table->string('codigo')->unique();
            $table->string('foliocomprobante');
            $table->string('descripcion');
            $table->string('estado');
            $table->string('costodeadquisicion');
            $table->string('area_id');
            $table->string('observaciones');
            $table->bigInteger('estatu_id');
            $table->bigInteger('user_id');
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
        Schema::dropIfExists('articulos');
    }
};
