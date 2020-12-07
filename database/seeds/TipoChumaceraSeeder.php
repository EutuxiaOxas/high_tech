<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoChumaceraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_chum')->insert([
        	'tipo_chum' => 'Tipo Brida',
        ]);
    	
    	DB::table('tipo_chum')->insert([
        	'tipo_chum' => 'Tipo Puente',
        ]);

        DB::table('tipo_chum')->insert([
        	'tipo_chum' => 'Tipo Tensora',
        ]);
    }
}
