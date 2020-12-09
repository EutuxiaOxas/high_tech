<?php

namespace App\Blog;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'blog_categories';

    public function articles()
    {
    	return $this->hasMany('App\Blog\Article', 'category_id');
    }
}
