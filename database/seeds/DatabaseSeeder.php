<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);

    	$this->call(CategorySeeder::class);
        $this->call(FormaChumaceraSeeder::class);
        $this->call(PosicionSeeder::class);
        $this->call(TipoCadenaSeeder::class);
        $this->call(TipoChumaceraSeeder::class);
        $this->call(TipoEmpateSeeder::class);
        $this->call(DiametroChumSeeder::class);
        $this->call(TipoSelloSeeder::class);
        $this->call(UserSeeder::class);
    }
}
