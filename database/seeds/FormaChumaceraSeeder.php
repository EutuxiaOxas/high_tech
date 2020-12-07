<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class FormaChumaceraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //forma_chum

        DB::table('forma_chum')->insert([
        	'forma_chum' => 'Redonda',
        ]);

        DB::table('forma_chum')->insert([
        	'forma_chum' => 'Cuadrada',
        ]);

        DB::table('forma_chum')->insert([
        	'forma_chum' => 'Ovalada',
        ]);

        DB::table('forma_chum')->insert([
        	'forma_chum' => ' N/A',
        ]);
    }
}
