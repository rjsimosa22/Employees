<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TypeMovement extends Authenticatable
{   
    protected $table = 'type_movement';
    protected $fillable = ['id','description'];
}
