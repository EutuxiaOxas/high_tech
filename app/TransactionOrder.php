<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionOrder extends Model
{
    protected $fillable = [
        'order_id', 'accounts_id', 'amount', 'referencia', 'capture', 'observation'
    ];

    public function account(){
    	return $this->belongsTo('App\Account', 'accounts_id');
    }
}
