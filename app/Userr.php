<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userr extends Model
{
    protected $fillable = ['name', 'email', 'password'];
}
