<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Vehicles extends Authenticatable
{
    protected $fillable = ['plate','category','mark','model','colour','year','number_engine','number_series','observations','status','id_client'];
}
