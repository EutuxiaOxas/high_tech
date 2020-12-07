<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	 //$this->call(UserSeeder::class);

        DB::table('users')->insert([
            'name' => 'Andres',
            'email' => 'omega@example.com',
            'password' => Hash::make('omega1234')
        ]); 

    	$this->call(CategorySeeder::class);
        $this->call(FormaChumaceraSeeder::class);
        $this->call(PosicionSeeder::class);
        $this->call(TipoCadenaSeeder::class);
        $this->call(TipoChumaceraSeeder::class);
        $this->call(TipoEmpateSeeder::class);
        $this->call(DiametroChumSeeder::class);
        $this->call(TipoSelloSeeder::class);
    }
}
