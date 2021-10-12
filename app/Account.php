<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'account', 'account_number', 'account_mail', 'account_titular', 'account_description', 'status'
    ];
}
