<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'status', 'amount'
    ];

    public function buyer(){
    	return $this->belongsTo('App\User', 'user_id');
    }

    //Relacion uno a muchos
    public function products_purchase(){
        return $this->hasMany('App\OrderProduct');
    }

}
