<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNosotrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nosotros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('imagen_derecha')->nullable();
            $table->string('imagen_izquierda')->nullable();
            $table->string('icon1')->nullable();
            $table->string('titulo_icon1')->nullable();
            $table->string('icon2')->nullable();
            $table->string('titulo_icon2')->nullable();
            $table->string('icon3')->nullable();
            $table->string('titulo_icon3')->nullable();
            $table->string('icon4')->nullable();
            $table->string('titulo_icon4')->nullable();
            $table->string('video')->nullable();
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
        Schema::dropIfExists('nosotros');
    }
}
