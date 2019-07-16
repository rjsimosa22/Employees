<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mechanics extends Authenticatable
{
    protected $fillable = ['id','description','abreviation','id_commission','profile_edit','date_edit','status','updated_at','created_at'];
}
