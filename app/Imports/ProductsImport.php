<?php

namespace App\Imports;

use App\Auto_Parameter;
use App\Cadena_Parameter;
use App\Category;
use App\Chumacera_Parameter;
use App\Moto_Parameter;
use App\Product;
use App\Serie6000_Parameter;
// use Maatwebsite\Excel\Concerns\ToModel;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductsImport implements ToCollection
{

    public function collection(Collection $rows)
    {
        $cont = 0;
        foreach ($rows as $row) 
        {
            // ignoro la primera fila
            if( $cont > 0 ){
                
                // obtener el titulo y buscar si ya existe
                $title = $row[2];
                $category = strtolower($row[1]);
    
                $producto = Product::where('titulo', $title)->first();
                $category = Category::where('slug', $category)->first();
                
    
                // en caso de existir, actualizar el precio y cantidad
                if ($producto) {
    
                    $producto->quantity = (int) $row[4];
                    $producto->precio   = (double) $row[5];
                    
                    $producto->save();
                    
                // en caso de no existir, crear el producto
                } else { 
    
                    if ($category) {
                        $category_id = $category->id;
                        switch ($category->slug) {
                            case 'automotriz':
                                $imagen = 'public/products_images/automotriz.webp';
                                break;
                            case 'industrial':
                                $imagen = 'public/products_images/industrial.webp';
                                break;
                            case 'moto':
                                $imagen = 'public/products_images/moto.webp';
                                break;
                            case 'chumacera':
                                $imagen = 'public/products_images/chumacera.webp';
                                break;
                            case 'cadenas':
                                $imagen = 'public/products_images/cadenas.webp';
                                break;
                            default:
                                $imagen = 'public/products_images/industrial.webp';
                                break;
                        }
    
                        Product::create([
                            'codigo_universal' => $row[0],
                            'titulo'           => str_replace('"','',$row[2]),
                            'descripcion'      => str_replace('"','',$row[3]),
                            'quantity'         => $row[4],
                            'precio'           => $row[5],
                            'aplicacion'       => str_replace('"','',$row[6]),
                            'slug'             => SlugService::createSlug(Product::class, 'slug', trim($row[2])),
                            'category_id'      => $category_id,
                            'imagen'           => $imagen,
                        ]);
    
                        $product_id = Product::latest('id')->first()->id;
                    
                        switch ($category->slug) {
                            case 'automotriz':
                                Auto_Parameter::create([
                                    'product_id'     => $product_id,
                                    'posicion_rueda' => $row[7],
                                    'd_interno'      => $row[8],
                                    'd_externo'      => $row[9],
                                    'espesor'        => $row[10],
                                ]);
                                break;
                            case 'industrial':
                                Serie6000_Parameter::create([
                                    'product_id' => $product_id,
                                    'tipo_sello' => str_replace('"','',$row[7]),
                                    'd_interno'  => str_replace('"','',$row[8]),
                                    'd_externo'  => str_replace('"','',$row[9]),
                                    'espesor'    => str_replace('"','',$row[10]),
                                ]);
                                break;
                            case 'moto':
                                Moto_Parameter::create([
                                    'product_id' => $product_id,
                                    'tipo_sello' => $row[7],
                                    'd_interno'  => $row[8],
                                    'd_externo'  => $row[9],
                                    'espesor'    => $row[10],
                                ]);
                                break;
                            case 'chumacera':
                                Chumacera_Parameter::create([
                                    'product_id'         => $product_id,
                                    'diametro_chumacera' => $row[7],
                                ]);
                                break;
                            case 'cadenas':
                                Cadena_Parameter::create([
                                    'product_id' => $product_id,
                                    'pitch'      => $row[7],
                                ]);
                                break;
                            default:
                                
                                break;
                        }
    
                        
                    }
                }

            }else{
                $cont++;
            }


        }
    }

}
