<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('address')->nullable();
            $table->string('horario')->nullable();
            $table->string('cellphone')->nullable();
            $table->string('phone')->nullable();
            $table->string('texto_footer')->nullable();
            $table->string('texto_contacto')->nullable();
            $table->string('keywords')->nullable();
            $table->text('description')->nullable();
            $table->string('email')->nullable();
            $table->string('email_form')->nullable();
            $table->text('map')->nullable();
            $table->string('logo')->nullable();
            $table->string('logo_footer')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkedin')->nullable();
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
        Schema::dropIfExists('configs');
    }
}
