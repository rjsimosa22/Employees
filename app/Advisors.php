<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Advisors extends Model
{   
    protected $table = 'advisors_service';
    protected $fillable = ['id','description','abreviation','mobile','profile_edit','date_edit','status'];
}
