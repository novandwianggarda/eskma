<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    //
    public $timestamps=false;

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function kabupaten(){
    	return $this->hasMany('App\Kabupaten');
    }

    public function opdprovinsi(){
    	return $this->hasMany('App\Opdprovinsi');
    }
}
