<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Commission extends Model
{   
    protected $fillable = ['id','description'];
}
