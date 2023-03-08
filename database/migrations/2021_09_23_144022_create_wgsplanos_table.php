<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWgsplanosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wgsplanos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('archivo');

            $table->unsignedBigInteger('cliente_id');

            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('set null');
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
        Schema::dropIfExists('wgsplanos');
    }
}
