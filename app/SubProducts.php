<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SubProducts extends Model
{   
    protected $table = 'sublines_product';
    protected $fillable = ['id','id_product','description','abreviation','profile_edit','date_edit','status'];
}
