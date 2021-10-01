<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin')
        ])->assignRole('administrador');

        // User::create([
        //     'name' => 'inventario',
        //     'email' => 'inventario@inventario.com',
        //     'password' => Hash::make('inventario')
        // ])->assignRole('inventario');

        // User::create([
        //     'name' => 'blogger',
        //     'email' => 'blogger@blogger.com',
        //     'password' => Hash::make('blogger')
        // ])->assignRole('blogger');

    }
}
