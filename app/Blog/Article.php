<?php

namespace App\Blog;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    public function categoria ()
    {
    	return $this->belongsTo('App\Blog\Category', 'category_id');
    }

    public function autor()
    {
    	return $this->belongsTo('App\User', 'autor_id');
    }
}
