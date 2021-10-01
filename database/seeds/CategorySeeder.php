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
            'slug' => 'serie-automotriz',
        	'category_color' => 'f68220'
        ]);

        DB::table('categories')->insert([
        	'category' => 'Serie Industrial',
        	'description' => 'Rodamientos rígidos de bolas.',
            'slug' => 'serie-industrial',
        	'category_color' => 'a2bd30'
        ]);

        DB::table('categories')->insert([
            'category' => 'Serie Moto',
            'description' => 'Línea de productos especialmente para motocicletas.',
            'slug' => 'serie-moto',
            'category_color' => 'ed1b24'
        ]);


        DB::table('categories')->insert([
            'category' => 'Serie Chumacera',
            'description' => 'Chumaceras tipo puente y tipo brida.',
            'slug' => 'serie-chumacera',
            'category_color' => '0273b7'
        ]);

        DB::table('categories')->insert([
            'category' => 'Serie Cadenas',
            'description' => 'Cadenas de excelente calidad.',
            'slug' => 'serie-cadenas',
            'category_color' => 'ffca08'
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
