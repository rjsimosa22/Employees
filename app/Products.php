<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Products extends Model
{   
    protected $table = 'sublines_product';
    protected $fillable = ['id','description','abreviation','profile_edit','date_edit','status'];
}
