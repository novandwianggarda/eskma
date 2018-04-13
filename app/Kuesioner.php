<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kuesioner extends Model
{
    //
    public $timestamps=false;

    public function upp(){
    	return $this->belongsTo('App\Upp');
    }
    public function jawaban(){
    	return $this->hasMany('App\Jawaban');
    }
    public function unsur(){
    	return $this->belongsTo('App\Unsur');
    }
}
