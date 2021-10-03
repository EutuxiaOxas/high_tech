<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use Sluggable;
    protected $table = 'products';
    protected $fillable = [
        'category_id', 'codigo_universal', 'titulo', 'imagen', 'descripcion', 'aplicacion', 'precio', 'quantity', 'slug', 
    ];

    public function categoria()
    {
    	return $this->belongsTo('App\Category', 'category_id');
    }

    public function auto()
    {
        return $this->hasOne('App\Auto_Parameter');
    }

    public function getAutosBySearch( $search ){

        $products = Product::where('titulo', $search)
        ->where('descripcion', $search)
        ->where('codigo_universal', $search)
        ->get();

        return $products;

    }

    public function chumacera()
    {
    	return $this->hasOne('App\Chumacera_Parameter');
    }

    public function cadena()
    {
    	return $this->hasOne('App\Cadena_Parameter');
    }


    public function moto()
    {
    	return $this->hasOne('App\Moto_Parameter');
    }

    public function industrial()
    {
    	return $this->hasOne('App\Serie6000_Parameter');
    }

    

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'titulo'
            ]
        ];
    }
}

