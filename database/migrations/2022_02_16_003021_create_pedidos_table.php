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
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');         
            $table->string('moneda')->nullable();
            $table->string('cod_cupon')->nullable();
            $table->decimal('dscto_cupon')->nullable();
            $table->decimal('monto_original')->default(0);
            $table->decimal('monto_final')->default(0);
            $table->string('cargo')->nullable();
            $table->text('voucher')->nullable();
            $table->string('origen')->nullable();            
            $table->datetime('fecha_pago')->nullable();
            $table->enum('cod_dsct', ['si', 'no'])->default('no');
            $table->integer('ano')->nullable();
            $table->integer('mes')->nullable();
            $table->integer('dia')->nullable();            
            $table->enum('estado', ['pendiente', 'finalizado', 'devuelto'])->default('pendiente');
            $table->softDeletes();
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
