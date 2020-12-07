<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PosicionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posiciones')->insert([
        	'posicion' => 'Rueda delantera',
        ]);

        DB::table('posiciones')->insert([
        	'posicion' => 'Rueda delantera externa',
        ]);

        DB::table('posiciones')->insert([
        	'posicion' => 'Rueda delantera interna',
        ]);

        DB::table('posiciones')->insert([
        	'posicion' => 'Rueda Trasera',
        ]);

        DB::table('posiciones')->insert([
        	'posicion' => 'Rueda Trasera externa',
        ]);

        DB::table('posiciones')->insert([
        	'posicion' => 'Rueda Trasera interna',
        ]);
    }
}
