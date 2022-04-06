<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            
            $table->enum('role', ['admin', 'cliente'])->default('cliente');
            $table->string('name');
            $table->string('dni')->nullable();
            $table->string('cellphone')->nullable();
            $table->string('avatar')->nullable();
            $table->date('cumple')->nullable();
            $table->string('direccion')->nullable();
            $table->string('distrito')->nullable();
            $table->integer('pais')->default(173);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
