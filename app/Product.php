<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function categoria()
    {
    	return $this->belongsTo('App\Category', 'category_id');
    }

    public function chumacera()
    {
    	return $this->hasOne('App\Chumacera_Parameter');
    }

    public function cadena()
    {
    	return $this->hasOne('App\Cadena_Parameter');
    }

    public function auto()
    {
    	return $this->hasOne('App\Auto_Parameter');
    }

    public function moto()
    {
    	return $this->hasOne('App\Moto_Parameter');
    }

    public function serie6000()
    {
    	return $this->hasOne('App\Serie6000_Parameter');
    }
}
