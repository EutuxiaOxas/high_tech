<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TipoCadenaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_cadena')->insert([
        	'tipo_cadena_texto' => 'Cadena simple',
        	'tipo_cadena_num' => 0
        ]);

        DB::table('tipo_cadena')->insert([
        	'tipo_cadena_texto' => 'Cadena doble',
        	'tipo_cadena_num' => 0
        ]);

        DB::table('tipo_cadena')->insert([
        	'tipo_cadena_texto' => 'Cadena triple',
        	'tipo_cadena_num' => 0
        ]);
    }
}
