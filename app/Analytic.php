<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analytic extends Model
{
    //
    public function page(){
    	return $this->belongsTo('App\Page');
    }

    public function product(){
    	return $this->belongsTo('App\Product');
    }
}
