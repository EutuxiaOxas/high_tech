<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCadenaParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cadena_parameters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->string('pitch');
            $table->foreignId('tipo_cadena_id');
            $table->foreignId('empate_id');
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('cascade');

            $table->foreign('tipo_cadena_id')->references('id')->on('tipo_cadena')
                ->onDelete('cascade');

            $table->foreign('empate_id')->references('id')->on('tipo_empates')
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
        Schema::dropIfExists('cadena_parameters');
    }
}
