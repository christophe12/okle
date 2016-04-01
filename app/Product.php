<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
       "name", "description"
    ];
    //relationships
    public function user(){
    	return $this->belongsTo('App\User');
    }
    
    public function haspage(){
        return $this->hasOne('App\Page');
    }

    public function page(){
    	return $this->belongsTo('App\Page');
    }
  
    public function images(){
    	return $this->hasMany('App\Image');
    }

    public function video(){
    	return $this->hasOne('App\video');
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

    //scopes
    public function scopeuserProduct($query, $userId){
        return $query->where('user_id', $userId);
    }

    public function scopefindByPage($query, $pageId){
        return $query->where('page_id', $pageId);
    }
}
