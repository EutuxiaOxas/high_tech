<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cadena_Parameter extends Model
{

    protected $fillable = [
        'product_id', 'pitch', 'tipo_cadena_id', 'empate_id'
    ];

    protected $table = 'cadena_parameters';

    public function product()
    {
    	return $this->belongsTo('App\Product', 'product_id');
    }

    public function tipoCadena()
    {
    	return $this->belongsTo('App\Tipo_Cadena', 'tipo_cadena_id');
    }

    public function tipoEmpate()
    {
    	return $this->belongsTo('App\Tipo_Empates', 'empate_id');
    }
}
