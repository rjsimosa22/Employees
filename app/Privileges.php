<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Privileges extends Authenticatable
{
    protected $fillable = ['id','description','status'];
}
