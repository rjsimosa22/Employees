<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    protected $fillable = ['name','document','type','status','address','phone','email','contact','birthdate','anniversary','observations'];
}
