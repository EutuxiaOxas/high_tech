<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Cadena extends Model
{
    protected $table = 'tipo_cadena';

    protected $fillable = [
        'tipo_cadena_texto', 'tipo_cadena_num'
    ];
}
