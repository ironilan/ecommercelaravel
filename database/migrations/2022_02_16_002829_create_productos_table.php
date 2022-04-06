<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->unsignedBigInteger('subcategoria_id');
            $table->foreign('subcategoria_id')->references('id')->on('subcategorias')->onDelete('cascade');
            $table->unsignedBigInteger('marca_id');
            $table->foreign('marca_id')->references('id')->on('marcas')->onDelete('cascade');
            $table->string('titulo')->nullable();
            $table->string('slug')->nullable();
            $table->string('precio_actual')->nullable();
            $table->string('precio_antes')->nullable();
            $table->string('stock')->nullable();
            $table->string('resumen')->nullable();
            $table->string('sku')->nullable();
            $table->string('estrellas')->nullable();
            $table->string('imagen')->nullable();
            $table->text('descripcion')->nullable();
            $table->enum('nuevo',['si', 'no'])->default('no');
            $table->enum('tipo',['promo', 'producto'])->default('producto');
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
        Schema::dropIfExists('productos');
    }
}
