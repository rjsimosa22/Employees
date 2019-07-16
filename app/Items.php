<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Items extends Model
{   
    protected $table = 'Items';
    protected $fillable = ['id','id_types_items','id_product','description','abreviation','id_coins','price','profile_edit','hour','date_edit','status'];
}
