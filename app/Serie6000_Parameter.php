<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie6000_Parameter extends Model
{

	protected $fillable = [
        'product_id', 'rodamiento', 'tipo_sello_id', 'd_interno', 'd_externo', 'espesor'
    ];
	
    protected $table = 'serie6000_parameters';

    public function product()
    {
    	return $this->belongsTo('App\Product', 'product_id');
    }

    public function tipoSello()
    {
    	return $this->belongsTo('App\Tipo_Sello', 'tipo_sello_id');
    }
}
