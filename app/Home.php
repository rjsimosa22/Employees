<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Home extends Authenticatable
{
    protected $fillable = ['id','name','description','edit','size_cod','size_description','size_abreviation'];
}
