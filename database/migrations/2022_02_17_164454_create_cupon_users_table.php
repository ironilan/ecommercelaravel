<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuponUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cupon_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cupon_id');
            $table->foreign('cupon_id')->references('id')->on('cupons')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->double('precio_sin_dscto')->nullable(); 
            $table->double('precio_con_dscto')->nullable(); 
            $table->double('dscto')->nullable(); 
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
        Schema::dropIfExists('cupon_users');
    }
}
