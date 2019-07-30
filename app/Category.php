<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'author',
    ];

    /**
     * Relationship with user one->one.
     *
     * @var function
     */
    public function getUser()
    {
        return $this->belongsTo('App\User', 'author', 'id');
    }

    /**
     * Relationship with article one->many.
     *
     * @var function
     */
    public function getArticle()
    {
        return $this->hasMany('App\Article', 'category', 'id');
    }
}
