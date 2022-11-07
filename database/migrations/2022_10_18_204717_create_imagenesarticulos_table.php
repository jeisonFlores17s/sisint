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
        Schema::create('imagenesarticulos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('articulos_id')
            ->references('id')
            ->on('articulos')
            ->onDelete('cascade');
            $table->string('imagenes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagenesarticulos');
    }
};
