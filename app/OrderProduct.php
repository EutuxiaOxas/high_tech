<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id', 'product_id', 'price', 'quantity'
    ];

    //Relacion uno a muchos Inversa
    public function order(){
        return $this->belongsTo('App\Order');
    }

    //Relacion uno a muchos Inversa
    public function product(){
        return $this->belongsTo('App\Product');
    }
}
