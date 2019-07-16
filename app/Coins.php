<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Coins extends Authenticatable
{
    protected $fillable = ['id','description','abreviation','symbol','profile_edit','date_edit','status'];
}
