<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //relationships
    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function product(){
    	return $this->hasOne('App\Product');
    }

    public function hasproduct(){
        return $this->belongsTo('App\Product');
    }

    public function images(){
    	return $this->hasMany('App\Image');
    }
    
    public function video(){
    	return $this->hasOne('App\Video');
    }

    public function textBlocks(){
    	return $this->hasMany('App\TextBlock');
    }
    
    public function views(){
    	return $this->hasMany('App\View');
    }

    public function clicks(){
    	return $this->hasMany('App\Click');
    }

    public function sales(){
    	return $this->hasMany('App\Sale');
    }

    public function analytic(){
    	return $this->hasOne('App\Analytic');
    }

    
    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = [
       'name'
    ];

    //scopes
    public function scopeuserPages($query, $userId){
    	return $query->where('user_id', $userId);
    }

    public function scopefindByName($query, $pageName){
        return $query->where('name', $pageName);
    }

    //accessors

    public function getNameAttribute($name){
        return ucfirst($name);
    }

    public function setNameAttribute($name){
        $this->attributes['name'] = strtolower($name);
    }
 
}
