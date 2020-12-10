<?php

namespace App\Blog;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $table = 'keywords';

    protected $fillable = ['keyword'];

    public function articles()
    {
        return $this->belongsToMany('App\Blog\Article', 'keywords_articles', 'keyword_id', 'article_id');
    }
}
