<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
   

    public function user(){

    	return $this->belongsTo('App\User');
    }
}
