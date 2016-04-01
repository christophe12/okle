<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TextBlock extends Model
{
    //relationships
    public function page(){
    	return $this->belongsTo('App\Page');
    }

    public function product(){
    	return $this->belongsTo('App\Product');
    }
}
