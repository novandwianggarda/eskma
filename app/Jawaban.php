<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    //
	public $timestamps=false;

    public function kuesioner(){
    	return $this->belongsTo('App\kuesioner');
    }
}
