<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'introduction', 'content', 'author', 'category',
    ];

    /**
     * Relationship with user one->many.
     *
     * @var function
     */
    public function getUser()
    {
        return $this->belongsTo('App\User', 'author', 'id');
    }

    /**
     * Relationship with category one->many.
     *
     * @var function
     */
    public function getCategory()
    {
        return $this->belongsTo('App\Category', 'category', 'id');
    }
}
