<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Types_Items extends Authenticatable
{
    protected $fillable = ['id','description','abbreviation','profile_edit','date_edit','status'];
}
