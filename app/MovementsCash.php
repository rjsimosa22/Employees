<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class MovementsCash extends Authenticatable
{   
    protected $table = 'movements_cash';
    protected $fillable = ['id','description','abreviation','id_type_movement','profile_edit','date_edit','status','updated_at','created_at'];
}
