<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TipoEmpateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_empates')->insert([
        	'tipo_empate' => 'Empate',
        ]);

        DB::table('tipo_empates')->insert([
        	'tipo_empate' => 'Medio empate',
        ]);
    }
}
