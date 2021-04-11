<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // creo la carpeta donde se guardaran los pdf de las categorias
        // Storage::makeDirectory('pdfs');
        // // creo la carpeta donde se guardaran las imagenes de las categorias
        // Storage::makeDirectory('category_images');
        // // creo la carpeta donde se guardaran las imagenes de los productos
        // Storage::makeDirectory('products_images');
        // // creo la carpeta donde se guardaran las imagenes de las categorias de los blog
        // Storage::makeDirectory('blog_category_images');
        // // creo la carpeta donde se guardaran las imagenes de los blogs
        // Storage::makeDirectory('blog_articuls_images');

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
