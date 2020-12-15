<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        	'category' => 'Serie Automotriz',
        	'description' => 'esta es una categoria',
        	'imagen' => 'https://picsum.photos/400/400',
        	'pdf' => 'aqui va el pdf',
            'slug' => 'serie-automotriz',
        	'category_color' => 'blue'
        ]);

        DB::table('categories')->insert([
        	'category' => 'Serie 6000',
        	'description' => 'esta es una categoria',
        	'imagen' => 'https://picsum.photos/400/400',
        	'pdf' => 'aqui va el pdf',
            'slug' => 'serie-6000',
        	'category_color' => 'red'
        ]);

        DB::table('categories')->insert([
            'category' => 'Serie Moto',
            'description' => 'esta es una categoria',
            'imagen' => 'https://picsum.photos/400/400',
            'pdf' => 'aqui va el pdf',
            'slug' => 'serie-moto',
            'category_color' => 'red'
        ]);

        
        DB::table('categories')->insert([
            'category' => 'Chumaceras',
            'description' => 'esta es una categoria',
            'imagen' => 'https://picsum.photos/400/400',
            'pdf' => 'aqui va el pdf',
            'slug' => 'chumaceras',
            'category_color' => 'red'
        ]);

        DB::table('categories')->insert([
            'category' => 'Serie cadenas',
            'description' => 'esta es una categoria',
            'imagen' => 'https://picsum.photos/400/400',
            'pdf' => 'aqui va el pdf',
            'slug' => 'serie-cadenas',
            'category_color' => 'red'
        ]);

        DB::table('categories')->insert([
            'category' => 'Otros',
            'description' => 'esta es una categoria',
            'imagen' => 'https://picsum.photos/400/400',
            'pdf' => 'aqui va el pdf',
            'slug' => 'otros',
            'category_color' => 'red'
        ]);

    }
}
