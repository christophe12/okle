<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //relationships
    public function pages(){
        return $this->hasMany('App\Page');
    }

    public function products(){
        return $this->hasMany('App\Product');
    }

    protected $dates = ['created_at', 'updated_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'companyName', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function getUsernameAttribute($username){
        return strtolower($username);
    }

    public function setUsernameAttribute($username){
        $this->attributes['username'] = strtolower($username);
    }
}
