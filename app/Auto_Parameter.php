<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auto_Parameter extends Model
{

	protected $fillable = [
        'product_id', 'articulo', 'aplicacion', 'posicion_id' , 'd_interno', 'd_externo', 'espesor'
    ];

    protected $table = 'auto_parameters';

    public function product()
    {
    	return $this->belongsTo('App\Product', 'product_id');
    }


    public function posicion()
    {
    	return $this->belongsTo('App\Posicion', 'posicion_id');
    }
}
