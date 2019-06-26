<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Categories extends Authenticatable
{
    protected $fillable = ['id','description','abbreviation','status'];
}
