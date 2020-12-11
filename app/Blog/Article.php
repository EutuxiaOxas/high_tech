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

    public function keywords()
    {
        return $this->belongsToMany('App\Blog\Keyword', 'keywords_articles', 'article_id', 'keyword_id');
    }
}
