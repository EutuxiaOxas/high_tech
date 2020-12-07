<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChumaceraParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chumacera_parameters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->foreignId('diametro_chum_id');
            $table->foreignId('tipo_chum_id');
            $table->foreignId('forma_chum_id');
            $table->integer('No_huecos');
            $table->timestamps();


            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('cascade');

            $table->foreign('diametro_chum_id')->references('id')->on('diametro_chum')
                ->onDelete('cascade');

            $table->foreign('tipo_chum_id')->references('id')->on('tipo_chum')
                ->onDelete('cascade');

            $table->foreign('forma_chum_id')->references('id')->on('forma_chum')
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
        Schema::dropIfExists('chumacera_parameters');
    }
}
