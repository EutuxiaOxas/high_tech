<?php

use Illuminate\Database\Seeder;

class DiametroChumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('diametro_chum')->insert([
        	'unidad' => 'Diametro Interno',
        	'valor' => '12 mm'
        ]);

        DB::table('diametro_chum')->insert([
        	'unidad' => 'Diametro Interno',
        	'valor' => '15 mm'
        ]);

        DB::table('diametro_chum')->insert([
        	'unidad' => 'Diametro Interno',
        	'valor' => '17 mm'
        ]);

        DB::table('diametro_chum')->insert([
        	'unidad' => 'Diametro Interno',
        	'valor' => '20 mm'
        ]);

        DB::table('diametro_chum')->insert([
        	'unidad' => 'Diametro Interno',
        	'valor' => '25 mm'
        ]);
    }
}
