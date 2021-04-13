<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auto_parameters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->string('articulo');
            $table->text('aplicacion');
            $table->foreignId('posicion_id');
            $table->float('d_interno');
            $table->float('d_externo');
            $table->float('espesor');
            $table->timestamps();


            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('cascade');

            $table->foreign('posicion_id')->references('id')->on('posiciones')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auto_parameters');
    }
}
