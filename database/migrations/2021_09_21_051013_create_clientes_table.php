<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->integer('dni')->nullable();
            $table->integer('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->string('email')->nullable();
            //para foto
            $table->string('avatar')->default('')->nullable();
            $table->string('sector')->nullable();
            $table->string('estado')->nullable();            
            $table->string('ruta')->nullable();
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
        Schema::dropIfExists('clientes');
    }
}
 