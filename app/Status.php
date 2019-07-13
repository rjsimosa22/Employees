<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Status extends Authenticatable
{
    protected $fillable = ['id','description'];
}
