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
        	'description' => 'Rodamientos  especializados en las aplicaciones automotrices.',
        	'imagen' => 'automotriz.png',
            'slug' => 'serie-automotriz',
        	'category_color' => 'blue'
        ]);

        DB::table('categories')->insert([
        	'category' => 'Serie 6000',
        	'description' => 'Rodamientos rígidos de bolas.',
        	'imagen' => '6000.png',
            'slug' => 'serie-6000',
        	'category_color' => 'red'
        ]);

        DB::table('categories')->insert([
            'category' => 'Serie Moto',
            'description' => 'Línea de productos especialmente para motocicletas.',
            'imagen' => 'moto.png',
            'slug' => 'serie-moto',
            'category_color' => 'red'
        ]);


        DB::table('categories')->insert([
            'category' => 'Chumaceras',
            'description' => 'Chumaceras tipo puente y tipo brida.',
            'imagen' => 'chumacera.png',
            'slug' => 'chumaceras',
            'category_color' => 'red'
        ]);

        DB::table('categories')->insert([
            'category' => 'Serie cadenas',
            'description' => 'Cadenas de excelente calidad.',
            'imagen' => 'cadenas.png',
            'slug' => 'serie-cadenas',
            'category_color' => 'red'
        ]);

        // DB::table('categories')->insert([
        //     'category' => 'Otros',
        //     'description' => 'esta es una categoria',
        //     'imagen' => 'https://picsum.photos/400/400',
        //     'slug' => 'otros',
        //     'category_color' => 'red'
        // ]);

    }
}
