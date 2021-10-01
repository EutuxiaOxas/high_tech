<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moto_Parameter extends Model
{

	protected $fillable = [
        'product_id', 'd_interno', 'espesor' , 'd_externo', 'tipo_sello'
    ];

    protected $table = 'moto_parameters';

    public function product()
    {
    	return $this->belongsTo('App\Product', 'product_id');
    }

    public function tipoSello()
    {
    	return $this->belongsTo('App\Tipo_Sello', 'tipo_sello_id');
    }
}
