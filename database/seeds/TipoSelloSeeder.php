<?php

use Illuminate\Database\Seeder;

class TipoSelloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_sello')->insert([
        	'tipo_sello' => 'Sello de Goma',
        ]);

        DB::table('tipo_sello')->insert([
        	'tipo_sello' => 'Sello Metalico',
        ]);
    }
}
