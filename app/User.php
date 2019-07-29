<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

      /**
     * Relationship with category one->many
     *
     * @var function
     */

    public function getCategory (){
        return $this->hasMany('App\Category', 'author', 'id');
    }
        
      /**
     * Relationship with article one->many
     *
     * @var function
     */

    public function getArticle (){
        return $this->hasMany('App\Article', 'author', 'id');
    }

}
